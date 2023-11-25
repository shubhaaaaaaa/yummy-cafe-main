document.addEventListener('DOMContentLoaded', () => {
  "use strict";


  /**
   * Sticky header on scroll
   */
  const selectHeader = document.querySelector('#header');
  if (selectHeader) {
    document.addEventListener('scroll', () => {
      window.scrollY > 100 ? selectHeader.classList.add('sticked') : selectHeader.classList.remove('sticked');
    });
  }

  // Scroll to the top of the page when it is refreshed
window.addEventListener('beforeunload', function () {
  window.scrollTo(0, 0);
});

  // Animation on scroll function and init
function aos_init() {
  AOS.init({
    duration: 1000,
    easing: 'ease-in-out',
    once: true,
    mirror: false
  });
}

// Delay the initialization of AOS until after the page has loaded and scroll position has been adjusted
window.addEventListener('load', () => {
  window.scrollTo(0, 0); // Scroll to the top of the page first
  setTimeout(() => {
    aos_init(); // Initialize AOS after a small delay
  }, 100);
});

});