<?php

if (! defined('ABSPATH')) {
    exit;
}

function practice_theme_register_acf_blocks()
{
    register_block_type(get_template_directory() . '/template-parts/blocks/hero');
    register_block_type(get_template_directory() . '/template-parts/blocks/stats-stripe');
    register_block_type(get_template_directory() . '/template-parts/blocks/iac-pavilion');
}
add_action('init', 'practice_theme_register_acf_blocks');
