<?php

if (! defined('ABSPATH')) {
    exit;
}

function practice_theme_register_acf_blocks()
{
    register_block_type(get_template_directory() . '/template-parts/blocks/hero');
    register_block_type(get_template_directory() . '/template-parts/blocks/stats-stripe');
    register_block_type(get_template_directory() . '/template-parts/blocks/iac-pavilion');
    register_block_type(get_template_directory() . '/template-parts/blocks/about-isf');
    register_block_type(get_template_directory() . '/template-parts/blocks/logo-wall');
    register_block_type(get_template_directory() . '/template-parts/blocks/join-us');
    register_block_type(get_template_directory() . '/template-parts/blocks/logo-stripe');
    register_block_type(get_template_directory() . '/template-parts/blocks/our-mission');
    register_block_type(get_template_directory() . '/template-parts/blocks/feature-banner');
}
add_action('init', 'practice_theme_register_acf_blocks');
