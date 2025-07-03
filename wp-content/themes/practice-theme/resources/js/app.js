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
