<?php

use BoxyBird\Inertia\Inertia;

$id = get_the_ID();
$title = get_the_title($id);
$content = apply_filters('the_content', get_the_content(null, false,$id));

return Inertia::render('Filmography/Single', [
    'title'   => $title,
    'content' => $content,
]);
