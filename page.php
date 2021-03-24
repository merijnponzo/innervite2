<?php

use BoxyBird\Inertia\Inertia;

$title = get_the_title(get_the_ID());
$content = apply_filters('the_content', get_the_content(null, false, get_the_ID()));

return Inertia::render('Page', [
    'title'   => $title,
    'content' => $content,
]);
