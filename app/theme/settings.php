<?php

// General WP theme options
add_action('init', function () {
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'primary-menu' => 'Primary Menu',
    ]);
});
