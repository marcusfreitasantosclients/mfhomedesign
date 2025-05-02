<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?= get_bloginfo('name') . ' | ' . get_bloginfo('description'); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?= get_option('site_favicon'); ?>">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php import_component('header', ['header' => []]); ?>


