<?php
// load composer
if (!file_exists($autoload = __DIR__ . '/vendor/autoload.php')) {
    die('This theme requires composer autoload, please run "composer install"');
}
require_once $autoload;
// load theme lib files
$theme_files = [
    'theme/post-types.php',
    'lib/vite.php',
    'lib/helpers.php',    
    'theme/inertia.php',
    'theme/navigation.php',
    'theme/settings.php',
    'lib/cleanup.php',
    'ponzoblocks/ponzoblocks.php',
];
foreach ($theme_files as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}

// declare ponzo theme class
new Ponzoblocks();
Ponzoblocks::init();


function my_custom_css()
{
echo '<script type="module" crossorigin src="http://localhost:3000/gutenberg.js"></script>';
}
add_action('admin_head', 'my_custom_css');


?>