<?php
// load theme lib files
<<<<<<< HEAD
$theme_files = [
    'lib/vite.php',
    'lib/lazyblocks.php',
    'lib/cleanup.php',
    'theme/inertia.php',
    'theme/navigation.php',
    'theme/settings.php'
];
foreach ($theme_files as $file) {
=======
$theme_library = [
    'lib/vite.php',
    'lib/lazyblocks.php'
];
foreach ($theme_library as $file) {
>>>>>>> ce5b66a743ac0551e7843469277ffa2291d6d6e6
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
?>