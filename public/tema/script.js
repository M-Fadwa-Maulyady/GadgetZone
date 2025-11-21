// basic slider logic
document.addEventListener('DOMContentLoaded', () => {
  const slides = [...document.querySelectorAll('.slide')];
  let index = 0;
  const nextBtn = document.getElementById('nextSlide');
  const prevBtn = document.getElementById('prevSlide');
  const dotsWrap = document.getElementById('sliderDots');

  function renderDots() {
    dotsWrap.innerHTML = '';
    slides.forEach((s, i) => {
      const d = document.createElement('button');
      d.className = 'dot';
      d.title = 'Go to slide ' + (i+1);
      d.addEventListener('click', () => goTo(i));
      dotsWrap.appendChild(d);
    });
  }

  function show(i) {
    slides.forEach(s => s.classList.remove('active'));
    slides[i].classList.add('active');
    Array.from(dotsWrap.children).forEach((d, idx) => {
      d.style.opacity = idx === i ? '1' : '0.45';
    });
  }

  function next() { index = (index + 1) % slides.length; show(index); }
  function prev() { index = (index - 1 + slides.length) % slides.length; show(index); }
  function goTo(i) { index = i; show(index); }

  renderDots();
  show(index);

  nextBtn.addEventListener('click', next);
  prevBtn.addEventListener('click', prev);

  // auto-play
  let autoplay = setInterval(next, 4500);
  [nextBtn, prevBtn, ...slides].forEach(el => {
    el.addEventListener('mouseenter', () => clearInterval(autoplay));
    el.addEventListener('mouseleave', () => autoplay = setInterval(next, 4500));
  });

  // category carousel controls
  const catTrack = document.getElementById('catTrack');
  const catNext = document.getElementById('catNext');
  const catPrev = document.getElementById('catPrev');

  catNext.addEventListener('click', () => {
    catTrack.scrollBy({ left: 220, behavior: 'smooth' });
  });
  catPrev.addEventListener('click', () => {
    catTrack.scrollBy({ left: -220, behavior: 'smooth' });
  });

  // small helpers
  document.getElementById('year').textContent = new Date().getFullYear();

  // search (demo)
  document.getElementById('searchInput').addEventListener('keydown', (e) => {
    if (e.key === 'Enter') alert('Search demo: ' + e.target.value);
  });

  // Add-to-cart demo
  document.querySelectorAll('.card .btn').forEach(btn => {
    btn.addEventListener('click', (ev) => {
      ev.target.textContent = 'Dimasukkan';
      ev.target.disabled = true;
    });
  });
});
