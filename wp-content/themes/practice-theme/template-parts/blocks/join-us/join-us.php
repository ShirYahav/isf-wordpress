<?php

$id = 'join-us-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$headline = get_field('headline');
$description = get_field('description');
$first_name_placeholder = get_field('first_name_placeholder');
$last_name_placeholder = get_field('last_name_placeholder');
$job_title_placeholder = get_field('job_title');
$affiliation_placeholder = get_field('affiliation');
$email_placeholder = get_field('email');
$country_code_placeholder = get_field('country_code');
$phone_placeholder = get_field('phone_number');
$button_text = get_field('button_text'); 

?>

<section id="<?php echo esc_attr($id); ?>" class="join-us-block">
    <div class="join-us-content">
        <?php if ($headline) : ?>
            <h2 class="join-us-headline"><?php echo esc_html($headline); ?></h2>
        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="join-us-description"><?php echo wp_kses_post($description); ?></div>
        <?php endif; ?>
    </div>

    <div class="form-wrapper">
        <form id="join-us-form-<?php echo esc_attr($block['id']); ?>" class="join-us-form">
            <?php wp_nonce_field('join_us_form_nonce', 'security'); ?>

            <?php 
            ?>
            <div class="form-row">
                <input type="text" name="first_name" placeholder="<?php echo esc_attr($first_name_placeholder); ?>" required>
            </div>
            <div class="form-row">
                <input type="text" name="last_name" placeholder="<?php echo esc_attr($last_name_placeholder); ?>" required>
            </div>
            <div class="form-row">
                <input type="text" name="job_title" placeholder="<?php echo esc_attr($job_title_placeholder); ?>" required>
            </div>
            <div class="form-row">
                <input type="text" name="affiliation" placeholder="<?php echo esc_attr($affiliation_placeholder); ?>" required>
            </div>
            <div class="form-row">
                <input type="email" name="email" placeholder="<?php echo esc_attr($email_placeholder); ?>" required>
            </div>

            <?php 
            ?>
            <div class="form-row form-row-phone">
                <input type="text" name="country_code" class="country-code-input" placeholder="<?php echo esc_attr($country_code_placeholder); ?>">
                <input type="tel" name="phone_number" class="phone-number-input" placeholder="<?php echo esc_attr($phone_placeholder); ?>">
            </div>

            <?php 
            ?>
            <div class="form-row form-row-submit">
                <button type="submit" class="form-submit"><?php echo esc_html($button_text); ?></button>
                <div class="form-message" aria-live="polite"></div>
            </div>
        </form>
    </div>
</section>