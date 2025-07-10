<?php
$header_vars = [
  'primary_menu_args' => [
    'theme_location' => 'primary',
    'container'      => false,
    'menu_class'     => 'primary-menu',
  ],
  'label_open'  => __('Toggle menu', 'practice-theme'),
  'label_close' => __('Close menu',  'practice-theme'),
];
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="site-header" class="site-header">
    <?php
    get_template_part('template-parts/header/site', 'header');
    ?>
  </header>