/**
 * nBdy — Main JavaScript
 * ======================
 * Core JS zit in footer.php (inline) voor snelle eerste render.
 * Dit bestand is voor extra modules die je stuk voor stuk kunt laden.
 */

// Lazy load images
if ('IntersectionObserver' in window) {
  const imgObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        if (img.dataset.src) {
          img.src = img.dataset.src;
          img.removeAttribute('data-src');
        }
        imgObserver.unobserve(img);
      }
    });
  }, { rootMargin: '50px' });

  document.querySelectorAll('img[data-src]').forEach(img => imgObserver.observe(img));
}

// Smooth scroll voor ankers
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

// Console easter egg
console.log('%c nBdy ', 'background: #A67C3D; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600;', '— Alles is verbonden.');
