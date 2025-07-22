<?php

function practice_theme_register_footer_widget_area()
{
  register_sidebar([
    'name'          => __('Footer Newsletter', 'practice-theme'),
    'id'            => 'footer-newsletter',
    'description'   => __('Drag the Newsletter Signup widget here.', 'practice-theme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
  ]);
}
add_action('widgets_init', 'practice_theme_register_footer_widget_area');

function practice_theme_register_footer_credits_widget_area() {
  register_sidebar( [
    'name'          => __( 'Footer Credits', 'practice-theme' ),
    'id'            => 'footer-credits',
    'description'   => __( 'Drop your footer credit text or HTML here.', 'practice-theme' ),
    'before_widget' => '<div id="%1$s" class="footer-credit %2$s">',
    'after_widget'  => '</div>',
  ] );
}
add_action( 'widgets_init', 'practice_theme_register_footer_credits_widget_area' );