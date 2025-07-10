<div class="footer-lower">
  <div class="footer-lower-powered">
    <img
      class="powered-by-img"
      src="<?php echo esc_url(get_theme_file_uri('dist/images/footer-images/powered-by.png')); ?>"
      alt="<?php echo esc_attr__('“Powered by” graphic', 'practice-theme'); ?>" />
    <img
      class="rakia-img"
      src="<?php echo esc_url(get_theme_file_uri('dist/images/footer-images/rakia.png')); ?>"
      alt="<?php echo esc_attr__('Rakia logo', 'practice-theme'); ?>" />
  </div>

  <nav
    class="footer-lower-nav"
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

  <div class="footer-lower-partners">
    <img
      src="<?php echo esc_url(get_theme_file_uri('dist/images/footer-images/startup-nation-central.png')); ?>"
      alt="<?php echo esc_attr__('Startup Nation Central logo', 'practice-theme'); ?>" />
    <img
      src="<?php echo esc_url(get_theme_file_uri('dist/images/footer-images/high-teck-association.png')); ?>"
      alt="<?php echo esc_attr__('High Tech Association logo', 'practice-theme'); ?>" />
    <img
      src="<?php echo esc_url(get_theme_file_uri('dist/images/footer-images/israel-export-institute.png')); ?>"
      alt="<?php echo esc_attr__('Israel Export Institute logo', 'practice-theme'); ?>" />
    <img
      src="<?php echo esc_url(get_theme_file_uri('dist/images/footer-images/ISA.png')); ?>"
      alt="<?php echo esc_attr__('ISA logo', 'practice-theme'); ?>" />
    <img
      src="<?php echo esc_url(get_theme_file_uri('dist/images/footer-images/ministry-of-innovation.png')); ?>"
      alt="<?php echo esc_attr__('Ministry of Innovation logo', 'practice-theme'); ?>" />
    <img
      src="<?php echo esc_url(get_theme_file_uri('dist/images/footer-images/israel-innovation.png')); ?>"
      alt="<?php echo esc_attr__('Israel Innovation Authority logo', 'practice-theme'); ?>" />
  </div>
</div>