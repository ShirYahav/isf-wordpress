<?php

function practice_theme_handle_newsletter()
{
    check_ajax_referer('newsletter_signup', 'nonce');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if (! $email) {
        wp_send_json_error(['message' => __('Please enter a valid email.', 'practice-theme')]);
    }

    $success = true;

    if ($success) {
        wp_send_json_success(['message' => __('Thanks for subscribing!', 'practice-theme')]);
    } else {
        wp_send_json_error(['message' => __('Subscription failed. Please try again.', 'practice-theme')]);
    }
}

add_action('wp_ajax_nopriv_practice_newsletter', 'practice_theme_handle_newsletter');
add_action('wp_ajax_practice_newsletter',    'practice_theme_handle_newsletter');

function practice_theme_handle_join_us_form()
{
    if (! isset($_POST['nonce']) || ! wp_verify_nonce($_POST['nonce'], 'join_us_form_nonce')) {
        wp_send_json_error(['message' => 'Security check failed']);
    }

    $first = sanitize_text_field($_POST['first_name']   ?? '');
    $last = sanitize_text_field($_POST['last_name']    ?? '');
    $job = sanitize_text_field($_POST['job_title']    ?? '');
    $affiliation = sanitize_text_field($_POST['affiliation']  ?? '');
    $email = sanitize_email($_POST['email']        ?? '');
    $country = sanitize_text_field($_POST['country_code'] ?? '');
    $phone = sanitize_text_field($_POST['phone_number'] ?? '');

    $to = get_option('admin_email');
    $subject = "Join Us submission from {$first} {$last}";
    $headers = ['Content-Type: text/html; charset=UTF-8'];
    $body  = "
      <h2>Join Us Submission</h2>
      <p><strong>Name:</strong> {$first} {$last}</p>
      <p><strong>Job Title:</strong> {$job}</p>
      <p><strong>Affiliation:</strong> {$affiliation}</p>
      <p><strong>Email:</strong> {$email}</p>
      <p><strong>Phone:</strong> +{$country} {$phone}</p>
    ";

    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success(['message' => 'Thank you! Your submission has been sent.']);
    } else {
        wp_send_json_error(['message' => 'There was an error sending your submission.']);
    }
}

add_action('wp_ajax_nopriv_practice_join_us', 'practice_theme_handle_join_us_form');
add_action('wp_ajax_practice_join_us', 'practice_theme_handle_join_us_form');
