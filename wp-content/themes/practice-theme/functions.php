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


//Temporary
function practice_theme_rename_home_to_join_us($items, $args)
{
  $home_url = trailingslashit(home_url());

  foreach ($items as $item) {
    if (isset($item->url) && $item->url === $home_url) {
      $item->title = __('Join Us >', 'practice-theme');
      $item->classes[] = 'menu-item-join-us';
    }
  }
  return $items;
}
add_filter('wp_nav_menu_objects', 'practice_theme_rename_home_to_join_us', 10, 2);

add_filter('show_admin_bar', '__return_false');
