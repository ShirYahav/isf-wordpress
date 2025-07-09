(function () {
  const canvas = document.getElementById('starfield');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');

  let stars = [];
  const numStars = 1000;
  const shinyPct = 0.1;
  const maxRadius = 1.0;
  const minRadius = 0.02;
  const shinyMinR = 1.5;
  const shinyMaxR = 3.5;
  const shinyMinBl = 2;
  const shinyMaxBl = 6;
  const globalSpeedFactor = 1;

  // Track last scroll so we can update properly
  let lastScrollY = window.scrollY || window.pageYOffset;
  let ticking = false;

  function resize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    initStars();
    render(); // draw immediately
  }

  function initStars() {
    stars = [];

    // normal stars
    for (let i = 0; i < numStars; i++) {
      const r = Math.pow(Math.random(), 3) * (maxRadius - minRadius) + minRadius;
      stars.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        r,
        blur: Math.random() * 2 + 0.5,
        speed: (Math.random() * 0.2 + 0.05) * globalSpeedFactor
      });
    }

    // shiny stars
    const shinyCount = Math.ceil(numStars * shinyPct);
    for (let i = 0; i < shinyCount; i++) {
      const r = Math.pow(Math.random(), 2) * (shinyMaxR - shinyMinR) + shinyMinR;
      stars.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        r,
        blur: Math.random() * (shinyMaxBl - shinyMinBl) + shinyMinBl,
        speed: (Math.random() * 0.1 + 0.02) * globalSpeedFactor
      });
    }
  }

  function render() {
    const scrollY = window.scrollY || window.pageYOffset;

    // always repaint
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    stars.forEach(star => {
      const y = (star.y + scrollY * star.speed) % canvas.height;
      ctx.beginPath();
      ctx.arc(star.x, y, star.r, 0, Math.PI * 2);
      ctx.fillStyle = '#fff';
      ctx.shadowColor = '#fff';
      ctx.shadowBlur = star.blur;
      ctx.fill();
      ctx.shadowBlur = 0;
    });

    lastScrollY = scrollY;
    ticking = false;
  }

  function onScroll() {
    if (!ticking) {
      window.requestAnimationFrame(render);
      ticking = true;
    }
  }

  window.addEventListener('resize', resize);
  window.addEventListener('scroll', onScroll);

  // kick things off
  resize();
})();
