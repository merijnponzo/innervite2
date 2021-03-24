<?php
// from https://raw.githubusercontent.com/boxybird/wordpress-inertia-demo-theme/master/src/wp-hooks.php
use BoxyBird\Inertia\Inertia;

// WP enqueue
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
       wp_localize_script('bb_inertia', 'bbInertia', [
        'nonce'         => wp_create_nonce('wp_rest'),
        'bb_ajax_nonce' => wp_create_nonce('bb_ajax_nonce'),
    ]);
});

// Share globally with Inertia views
add_action('init', function () {
    Inertia::share([
        'site' => [
            'name'       => get_bloginfo('name'),
            'description'=> get_bloginfo('description'),
        ]
    ]);
    Inertia::share([
        'primary_menu' => array_map(function ($menu_item) {
            return [
                'id'   => $menu_item->ID,
                'link' => $menu_item->url,
                'name' => $menu_item->title,
            ];
        }, get_menu_items_by_registered_slug('primary-menu'))
    ]);
});

