const navbar = document.getElementById('navbar');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 0) {
      navbar.classList.remove('opacity-0');
      navbar.classList.add('opacity-100', 'pointer-events-auto');
    }
  });

  navbar.addEventListener('mouseenter', () => {
    navbar.classList.remove('opacity-0');
    navbar.classList.add('opacity-100')
  });

  setTimeout(() => {
    navbar.classList.add('opacity-100', 'pointer-events-auto', 'permanently-visible');
    navbar.classList.remove('opacity-0');
  }, 3000); // 3 second delay
  