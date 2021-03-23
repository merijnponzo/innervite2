<?php
// This would be your framework default bootstrap file

// During dev, this file would be hit when accessing your local host, like:
// http://vite-php-setup.test

require_once __DIR__ . '/helpers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite App</title>
    <?= vite('app.js') ?>
    <?php wp_head(); ?>
</head>

<body>
<div> test</div>
<?php bb_inject_inertia(); ?>
<?php wp_footer(); ?>
</body>

</html>
