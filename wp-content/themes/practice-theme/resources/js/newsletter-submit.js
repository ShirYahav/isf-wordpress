jQuery(document).ready(function ($) {
    const $form = $('#newsletter-signup');
    const $email = $('#newsletter-email');
    const $message = $form.find('.newsletter-signup-message');

    $form.on('submit', (e) => {
        e.preventDefault();

        $.post(
            newsletterSettings.ajaxUrl,
            {
                action: 'practice_newsletter',
                email: $email.val(),
                nonce: newsletterSettings.nonce
            },
            (res) => {
                if (res.success) {
                    $message.text(res.data.message);
                    $email.val('');
                } else {
                    $message.text(res.data.message);
                }
            },
            'json'
        );
    });
});