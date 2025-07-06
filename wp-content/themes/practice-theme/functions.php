<?php
function practice_theme_enqueue_assets()
{
  $theme_dir = get_template_directory_uri();
  $css_file  = get_template_directory() . '/dist/css/style.css';
  $js_file   = get_template_directory() . '/dist/js/app.js';

  wp_enqueue_style(
    'practice-style',
    esc_url($theme_dir . '/dist/css/style.css'),
    [],
    filemtime($css_file)
  );
  wp_enqueue_script(
    'practice-script',
    esc_url($theme_dir . '/dist/js/app.js'),
    ['jquery'],
    filemtime($js_file),
    true
  );
}
add_action('wp_enqueue_scripts', 'practice_theme_enqueue_assets');

add_filter('show_admin_bar', '__return_false');

function practice_theme_register_menus() {
  register_nav_menus( array(
    'secondary' => __( 'Secondary Menu', 'practice-theme' ),
  ) );
}
add_action( 'after_setup_theme', 'practice_theme_register_menus' );


