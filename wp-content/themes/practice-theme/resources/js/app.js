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

(function () {
  const canvas = document.getElementById('starfield');
  if (!canvas) return;

  const ctx = canvas.getContext('2d');
  let stars = [];
  const numStars = 700;
  const shinyPct = 0.1;
  const maxRadius = 1.5;
  const minRadius = 0.1;
  const shinyMinR = 1.5;
  const shinyMaxR = 4.0;
  const shinyMinBl = 4;
  const shinyMaxBl = 10;
  //const globalSpeedFactor = 1;

  function resize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    initStars();
  }

  function initStars() {
    stars = [];

    // normal stars
    for (let i = 0; i < numStars; i++) {
      stars.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        r: Math.random() * (maxRadius - minRadius) + minRadius,
        blur: Math.random() * 2 + 0.5,
        speed: (Math.random() * 0.2 + 0.05) * globalSpeedFactor
      });
    }

    // shiny stars
    const shinyCount = Math.ceil(numStars * shinyPct);
    for (let i = 0; i < shinyCount; i++) {
      stars.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        r: Math.random() * (shinyMaxR - shinyMinR) + shinyMinR,
        blur: Math.random() * (shinyMaxBl - shinyMinBl) + shinyMinBl,
        speed: (Math.random() * 0.1 + 0.02) * globalSpeedFactor
      });
    }
  }

  function draw() {
    const scrollY = window.scrollY || window.pageYOffset;
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    stars.forEach(star => {
      // slower parallax: half of previous speed
      const y = (star.y + scrollY * star.speed) % canvas.height;

      ctx.beginPath();
      ctx.arc(star.x, y, star.r, 0, Math.PI * 2);
      ctx.fillStyle = '#fff';
      ctx.shadowColor = '#fff';
      ctx.shadowBlur = star.blur;
      ctx.fill();
      ctx.shadowBlur = 0;
    });

    requestAnimationFrame(draw);
  }

  window.addEventListener('resize', resize);
  resize();
  draw();
})();


