<?php

function practice_handle_newsletter() {
  check_ajax_referer( 'newsletter_signup', 'nonce' );
  $email = filter_input( INPUT_POST, 'email', FILTER_VALIDATE_EMAIL );
  if ( ! $email ) {
    wp_send_json_error([ 'message' => __( 'Please enter a valid email.', 'practice-theme' ) ]);
  }

  $success = true;

  if ( $success ) {
    wp_send_json_success([ 'message' => __( 'Thanks for subscribing!', 'practice-theme' ) ]);
  } else {
    wp_send_json_error([ 'message' => __( 'Subscription failed. Please try again.', 'practice-theme' ) ]);
  }
}
add_action( 'wp_ajax_nopriv_practice_newsletter', 'practice_handle_newsletter' );
add_action( 'wp_ajax_practice_newsletter',    'practice_handle_newsletter' );
