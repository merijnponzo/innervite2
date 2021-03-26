<?php

use BoxyBird\Inertia\Inertia;


// Build items array
$items = array_map(function ($item) {
    return [
        'id'     => $item->ID,
        'link'   => get_the_permalink($item->ID),
        'poster' => get_the_post_thumbnail_url($item->ID),
        'title'  => html_entity_decode(get_the_title($item->ID)),
    ];
}, $wp_query->posts);

// Build pagination array
$current_page = isset($wp_query->query['paged']) ? (int) $wp_query->query['paged'] : 1;
$prev_page    = $current_page > 1 ? $current_page - 1 : false;
$next_page    = $current_page + 1;

$pagination = [
    'prev_page'    => $prev_page,
    'next_page'    => $next_page,
    'current_page' => $current_page,
    'total_pages'  => $wp_query->max_num_pages,
    'total_items' => (int) $wp_query->found_posts,
];

// Return Inertia view with data
return Inertia::render('Filmography/Index', [
    'items'     => $items,
    'pagination' => $pagination
]);
