<footer class="footer-upper">
    <div class="footer-upper-logo-powered-by">
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/isf-logo.svg'); ?>"
                    alt="<?php bloginfo('name'); ?> logo"
                    class="img-logo" />
            </a>
        </div>
        <div class="powered-by">
            <img
                class="powered-by-img"
                src="<?php echo esc_url(get_theme_file_uri('resources/images/footer-images/powered-by.png')); ?>"
                alt="<?php echo esc_attr__('“Powered by” graphic', 'practice-theme'); ?>" />
            <img
                class="powered-by-rakia"
                src="<?php echo esc_url(get_theme_file_uri('resources/images/footer-images/rakia.png')); ?>"
                alt="<?php echo esc_attr__('Rakia logo', 'practice-theme'); ?>" />
        </div>
    </div>

    <div class="footer-upper-newsletter-container">
        <?php if (is_active_sidebar('footer-newsletter')) : ?>
            <?php dynamic_sidebar('footer-newsletter'); ?>
        <?php endif; ?>
    </div>

    <div class="footer-upper-menus">
        <nav class="footer-upper-main-menu" aria-label="<?php esc_attr_e('Primary menu', 'practice-theme'); ?>">
            <?php wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'primary-menu',
            ]); ?>
        </nav>
        <nav
            class="footer-upper-secondary-menu"
            aria-label="<?php echo esc_attr__('Footer Legal Menu', 'practice-theme'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'secondary',
                'container'      => false,
                'menu_class'     => 'footer-lower-nav-list',
                'depth'          => 1,
                'fallback_cb'    => false,
            ]);
            ?>
        </nav>
    </div>

    <div>
        <?php if (is_active_sidebar('footer-credits')) : ?>
            <div class="footer-credits-area">
                <?php dynamic_sidebar('footer-credits'); ?>
            </div>
        <?php endif; ?>
    </div>
</footer>