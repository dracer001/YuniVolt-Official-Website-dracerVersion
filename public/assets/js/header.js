console.log("hello world");
console.log("hello world 2");
const navBar = document.querySelector(".nav-content-container")
document.querySelector(".nav-btn").addEventListener('click', function (event) {
  navBar.classList.add('open');
  navBar.style.width="0";
  navBar.style.transition="width 2s";
  navBar.style.width="80%";
  console.log("clicked");
})

document.querySelector(".close-nav").addEventListener('click', function (event) {
  navBar.classList.remove('open');
  navBar.style.width="0";
  console.log("unclicked");
})


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





