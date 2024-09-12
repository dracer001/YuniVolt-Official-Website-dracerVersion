console.log("hello world");

// DEAL WITH THE HEADER SCROLL POSITION
let lastScrollTop = 0;
const header = document.querySelector('.header-nav');

window.addEventListener('scroll', () => {
  let scrollTop = window.scrollY || document.documentElement.scrollTop;
  
  if (scrollTop > lastScrollTop) {
    // Scroll Down - hide the header
    header.classList.add('hidden');
  } else {
    // Scroll Up - show the header
    header.classList.remove('hidden');
  }
  
  lastScrollTop = scrollTop;
});





