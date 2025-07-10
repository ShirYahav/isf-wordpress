<?php
$primary_menu_args = [
    'theme_location' => 'primary',
    'container'      => false,
    'menu_class'     => 'primary-menu',
];

$label_open  = __('Toggle menu', 'practice-theme');
$label_close = __('Close menu',  'practice-theme');
?>
<div class="header-logo">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <img
            src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/isf-logo.svg'); ?>"
            alt="<?php bloginfo('name'); ?> logo"
            class="img-logo" />
    </a>
</div>

<nav class="main-navigation" aria-label="<?php esc_attr_e('Primary menu', 'practice-theme'); ?>">
    <?php wp_nav_menu($primary_menu_args); ?>
</nav>

<div class="site-menu">
    <button class="menu-toggle menu-toggle-open"
        aria-expanded="false"
        aria-label="<?php echo esc_attr($label_open); ?>">
        <img src="<?php echo get_template_directory_uri() . '/dist/images/header-images/dark-burger.svg'; ?>"
            alt="<?php echo esc_attr($label_open); ?>"
            class="menu-icon" />
    </button>

    <div class="side-menu">
        <div class="side-menu-close">
            <button class="menu-toggle menu-toggle-close"
                aria-expanded="true"
                aria-label="<?php echo esc_attr($label_close); ?>">
                <img src="<?php echo get_template_directory_uri() . '/dist/images/header-images/exit-menu.png'; ?>"
                    alt="<?php echo esc_attr($label_close); ?>"
                    class="menu-icon" />
            </button>
        </div>

        <div class="side-menu-items">
            <?php wp_nav_menu($primary_menu_args); ?>
        </div>
    </div>
</div>