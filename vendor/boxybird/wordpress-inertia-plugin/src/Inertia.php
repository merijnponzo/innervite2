<?php

namespace BoxyBird\Inertia;

use Closure;
use Illuminate\Support\Arr;

class Inertia
{
    protected static $url;

    protected static $props;

    protected static $request;

    protected static $version;

    protected static $component;

    protected static $shared_props = [];

    protected static $root_view = 'app.php';

    public static function render(string $component, array $props = [])
    {
        global $bb_inertia_page;

        self::setRequest();

        self::setUrl();
        self::setComponent($component);
        self::setProps($props);

        $bb_inertia_page = [
            'url'       => self::$url,
            'props'     => self::$props,
            'version'   => self::$version,
            'component' => self::$component,
        ];

        if (InertiaHeaders::inRequest()) {
            InertiaHeaders::addToResponse();

            wp_send_json($bb_inertia_page);
        }

        require_once get_stylesheet_directory() . '/' . self::$root_view;
    }

    public static function setRootView(string $name)
    {
        self::$root_view = $name;
    }

    public static function version(string $version = '')
    {
        self::$version = $version;
    }

    public static function share($key, $value = null)
    {
        if (is_array($key)) {
            self::$shared_props = array_merge(self::$shared_props, $key);
        } else {
            Arr::set(self::$shared_props, $key, $value);
        }
    }

    protected static function setRequest()
    {
        global $wp;

        self::$request = array_merge([
            'WP-Inertia' => (array) $wp,
        ], getallheaders());
    }

    protected static function setUrl()
    {
        self::$url = '/' . data_get(self::$request, 'WP-Inertia.request');
    }

    protected static function setProps(array $props)
    {
        $props = array_merge($props, self::$shared_props);

        $only = array_filter(explode(',', data_get(self::$request, 'X-Inertia-Partial-Data')));

        $props = ($only && data_get(self::$request, 'X-Inertia-Partial-Component') === self::$component)
            ? Arr::only($props, $only)
            : $props;

        array_walk_recursive($props, function (&$prop) {
            if ($prop instanceof Closure) {
                $prop = $prop();
            }
        });

        self::$props = $props;
    }

    protected static function setComponent(string $component)
    {
        self::$component = $component;
    }
}
