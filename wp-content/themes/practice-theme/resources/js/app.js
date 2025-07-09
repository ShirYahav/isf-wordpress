require('./space-bg');

jQuery(function ($) {
  const $siteMenu = $('.site-menu');
  const $panel = $siteMenu.find('.side-menu');
  const $toggle = $siteMenu.find('.menu-toggle');
  const $siteHeader = $('#site-header');

  $toggle.on('click', function () {
    const isOpen = $panel.hasClass('is-open');

    $toggle.attr('aria-expanded', String(!isOpen));
    $panel.toggleClass('is-open');
    $siteMenu.toggleClass('is-open');
    $siteHeader.toggleClass('is-menu-open', !isOpen);
  });
});

jQuery(($) => {
  const $form = $('#newsletter-signup');
  const $email = $('#newsletter-email');
  const $message = $form.find('.newsletter-signup-message');

  $form.on('submit', (e) => {
    console.log('Newsletter form submit handler hit');
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




