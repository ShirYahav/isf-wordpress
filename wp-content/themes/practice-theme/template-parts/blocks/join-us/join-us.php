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
        <?php
        get_template_part(
            'template-parts/components/form',
            null,
            [
                'form_id' => 'join-us-form-' . $block['id'],
                'nonce_action' => 'join_us_form_nonce',
                'nonce_name' => 'nonce',
                'first_name_placeholder' => $first_name_placeholder,
                'last_name_placeholder' => $last_name_placeholder,
                'job_title_placeholder' => $job_title_placeholder,
                'affiliation_placeholder' => $affiliation_placeholder,
                'email_placeholder' => $email_placeholder,
                'country_code_placeholder' => $country_code_placeholder,
                'phone_placeholder' => $phone_placeholder,
                'button_text' => $button_text,
            ]
        );
        ?>
    </div>
</section>