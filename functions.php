<?php
// load theme lib files
$theme_files = [
    'lib/vite.php',
    'lib/lazyblocks.php',
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
?>