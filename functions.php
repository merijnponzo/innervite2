<?php
// load theme lib files
$theme_files = [
    'lib/vite.php',
    'lib/ponzo.php',
    'lib/cleanup.php',
    'theme/inertia.php',
    'theme/navigation.php',
    'theme/settings.php'
];
foreach ($theme_files as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}

// declare ponzo theme class
new Ponzo();
Ponzo::init();

// load composer
if (!file_exists($autoload = __DIR__ . '/vendor/autoload.php')) {
    die('This theme requires composer autoload, please run "composer install"');
}
require_once $autoload;
?>