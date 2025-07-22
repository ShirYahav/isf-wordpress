jQuery(function ($) {
  const config = {
    breakpoint: 1115,
    largeScreenStars: 1000,
    smallScreenStars: 500,
    shinyPct: 0.1,
    maxRadius: 1.0,
    minRadius: 0.02,
    shinyMinR: 1.5,
    shinyMaxR: 3.5,
    shinyMinBl: 2,
    shinyMaxBl: 6,
    debounceTime: 100,
  };

  function getStarCount() {
    return $(window).width() <= config.breakpoint
      ? config.smallScreenStars
      : config.largeScreenStars;
  }

  function createStars(count, width, height) {
    const stars = [];
    const shinyCount = Math.ceil(count * config.shinyPct);

    for (let i = 0; i < count; i++) {
      const isShiny = i < shinyCount;
      const r = isShiny
        ? Math.pow(Math.random(), 2) * (config.shinyMaxR - config.shinyMinR) + config.shinyMinR
        : Math.pow(Math.random(), 3) * (config.maxRadius - config.minRadius) + config.minRadius;

      const blur = isShiny
        ? Math.random() * (config.shinyMaxBl - config.shinyMinBl) + config.shinyMinBl
        : Math.random() * 2 + 0.5;

      stars.push({
        x: Math.random() * width,
        y: Math.random() * height,
        r: r,
        blur: blur,
      });
    }
    return stars;
  }

  function draw(canvas, ctx, stars) {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    stars.forEach(star => {
      ctx.beginPath();
      ctx.arc(star.x, star.y, star.r, 0, Math.PI * 2);
      ctx.fillStyle = '#fff';
      ctx.shadowColor = '#fff';
      ctx.shadowBlur = star.blur;
      ctx.fill();
    });
    ctx.shadowBlur = 0;
  }

  function setup() {
    const $canvas = $('#starfield');
    if (!$canvas.length) return;
    const canvas = $canvas[0];
    const ctx = canvas.getContext('2d');

    const redraw = () => {
      canvas.width = $(window).width();
      canvas.height = $(window).height();
      const starCount = getStarCount();
      const stars = createStars(starCount, canvas.width, canvas.height);
      draw(canvas, ctx, stars);
    };

    let resizeTimer;
    $(window).on('resize', () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(redraw, config.debounceTime);
    });

    redraw();
  }

  setup();
});