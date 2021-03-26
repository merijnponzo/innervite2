<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= vite('app.js') ?>
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
<?php bb_inject_inertia(); ?>
<?php wp_footer(); ?>
</body>
</html>
