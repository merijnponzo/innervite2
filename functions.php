<?php
// load theme lib files
$theme_library = [
    'lib/vite.php',
    'lib/lazyblocks.php'
];
foreach ($theme_library as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
?>