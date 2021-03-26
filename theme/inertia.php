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
        'navigation' => NavBuildAll()
    ]);
});

