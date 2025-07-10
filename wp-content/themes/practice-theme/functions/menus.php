<?php

function practice_theme_register_menus()
{
    register_nav_menus(array(
        'primary'   => __('Primary Menu',   'practice-theme'),
        'secondary' => __('Legal Menu', 'practice-theme'),
    ));
}
add_action('after_setup_theme', 'practice_theme_register_menus');
