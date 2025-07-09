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

  wp_localize_script('practice-script', 'newsletterSettings', [
    'ajaxUrl' => admin_url('admin-ajax.php'),
    'nonce'   => wp_create_nonce('newsletter_signup'),
  ]);
}
add_action('wp_enqueue_scripts', 'practice_theme_enqueue_assets');

add_filter('show_admin_bar', '__return_false');

function practice_theme_register_menus()
{
  register_nav_menus(array(
    'primary'   => __('Primary Menu',   'practice-theme'),
    'secondary' => __('Secondary Menu', 'practice-theme'),
  ));
}
add_action('after_setup_theme', 'practice_theme_register_menus');

require get_template_directory() . '/inc/widget-newsletter.php';

// Load AJAX handler
require get_template_directory() . '/inc/ajax-newsletter.php';

// Register the footer widget area
function practice_register_footer_widget_area()
{
  register_sidebar([
    'name'          => __('Footer Newsletter', 'practice-theme'),
    'id'            => 'footer-newsletter',
    'description'   => __('Drag the Newsletter Signup widget here.', 'practice-theme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
  ]);
}
add_action('widgets_init', 'practice_register_footer_widget_area');

function practice_register_footer_credits_widget_area() {
  register_sidebar( [
    'name'          => __( 'Footer Credits', 'practice-theme' ),
    'id'            => 'footer-credits',
    'description'   => __( 'Drop your footer credit text or HTML here.', 'practice-theme' ),
    'before_widget' => '<div id="%1$s" class="footer-credit %2$s">',
    'after_widget'  => '</div>',
  ] );
}
add_action( 'widgets_init', 'practice_register_footer_credits_widget_area' );
