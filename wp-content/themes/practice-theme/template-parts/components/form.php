<?php

if (! defined('ABSPATH')) {
    exit;
}

$form_id = $args['form_id'];
$nonce_action = $args['nonce_action'];
$nonce_name = $args['nonce_name'];
$first_name_placeholder = $args['first_name_placeholder'];
$last_name_placeholder = $args['last_name_placeholder'];
$job_title_placeholder = $args['job_title_placeholder'];
$affiliation_placeholder = $args['affiliation_placeholder'];
$email_placeholder = $args['email_placeholder'];
$country_code_placeholder = $args['country_code_placeholder'];
$phone_placeholder = $args['phone_placeholder'];
$button_text = $args['button_text'];
?>

<form
    id="<?php echo esc_attr($form_id); ?>"
    class="join-us-form"
    method="post"
    novalidate>
    <?php wp_nonce_field($nonce_action, $nonce_name); ?>

    <div class="form-row">
        <label for="<?php echo esc_attr("{$form_id}-first-name"); ?>" class="screen-reader-text">
            <?php esc_html_e('First name', 'your-text-domain'); ?>
        </label>
        <input
            type="text"
            id="<?php echo esc_attr("{$form_id}-first-name"); ?>"
            name="first_name"
            placeholder="<?php echo esc_attr($first_name_placeholder); ?>"
            required>
    </div>

    <div class="form-row">
        <label for="<?php echo esc_attr("{$form_id}-last-name"); ?>" class="screen-reader-text">
            <?php esc_html_e('Last name', 'your-text-domain'); ?>
        </label>
        <input
            type="text"
            id="<?php echo esc_attr("{$form_id}-last-name"); ?>"
            name="last_name"
            placeholder="<?php echo esc_attr($last_name_placeholder); ?>"
            required>
    </div>

    <div class="form-row">
        <label for="<?php echo esc_attr("{$form_id}-job-title"); ?>" class="screen-reader-text">
            <?php esc_html_e('Job title', 'your-text-domain'); ?>
        </label>
        <input
            type="text"
            id="<?php echo esc_attr("{$form_id}-job-title"); ?>"
            name="job_title"
            placeholder="<?php echo esc_attr($job_title_placeholder); ?>">
    </div>

    <div class="form-row">
        <label for="<?php echo esc_attr("{$form_id}-affiliation"); ?>" class="screen-reader-text">
            <?php esc_html_e('Affiliation', 'your-text-domain'); ?>
        </label>
        <input
            type="text"
            id="<?php echo esc_attr("{$form_id}-affiliation"); ?>"
            name="affiliation"
            placeholder="<?php echo esc_attr($affiliation_placeholder); ?>">
    </div>

    <div class="form-row">
        <label for="<?php echo esc_attr("{$form_id}-email"); ?>" class="screen-reader-text">
            <?php esc_html_e('Email address', 'your-text-domain'); ?>
        </label>
        <input
            type="email"
            id="<?php echo esc_attr("{$form_id}-email"); ?>"
            name="email"
            placeholder="<?php echo esc_attr($email_placeholder); ?>"
            required>
    </div>

    <div class="form-row form-row-phone">
        <label for="<?php echo esc_attr("{$form_id}-country-code"); ?>" class="screen-reader-text">
            <?php esc_html_e('Country code', 'your-text-domain'); ?>
        </label>
        <input
            type="text"
            id="<?php echo esc_attr("{$form_id}-country-code"); ?>"
            name="country_code"
            class="country-code-input"
            placeholder="<?php echo esc_attr($country_code_placeholder); ?>">

        <label for="<?php echo esc_attr("{$form_id}-phone-number"); ?>" class="screen-reader-text">
            <?php esc_html_e('Phone number', 'your-text-domain'); ?>
        </label>
        <input
            type="tel"
            id="<?php echo esc_attr("{$form_id}-phone-number"); ?>"
            name="phone_number"
            class="phone-number-input"
            placeholder="<?php echo esc_attr($phone_placeholder); ?>"
            required>
    </div>

    <div class="form-row form-row-submit">
        <button type="submit" class="form-submit">
            <?php echo esc_html($button_text); ?>
        </button>
        <div class="form-message" aria-live="polite"></div>
    </div>
</form>