<form id="newsletter-signup" class="newsletter-signup" action="" method="POST" novalidate>
    <?php wp_nonce_field('newsletter_signup', 'newsletter_nonce'); ?>

    <label for="newsletter-email" class="newsletter-signup-label screen-reader-text">
        <?php esc_html_e('Email Address', 'practice-theme'); ?>
    </label>
    <input
        type="email"
        id="newsletter-email"
        name="email"
        class="newsletter-signup-email"
        placeholder="<?php esc_attr_e('Email', 'practice-theme'); ?>"
        required />

    <div class="newsletter-signup-submit-social">
        <button type="submit" class="newsletter-signup-submit">
            <?php esc_html_e('Subscribe', 'practice-theme'); ?>
        </button>

        <a
            href="https://www.linkedin.com/showcase/israelspaceforum/"
            class="newsletter-signup-social"
            target="_blank"
            rel="noopener"
            aria-label="Follow us on LinkedIn">
            <img src="<?php echo esc_url(get_theme_file_uri('dist/images/footer-images/linked-in.png')); ?>"
                alt="" />
        </a>
    </div>
    <div class="newsletter-signup-message" aria-live="polite"></div>

</form>