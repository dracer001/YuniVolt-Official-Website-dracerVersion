console.log("hello header");
const navBar = document.querySelector(".nav-content-container")
document.querySelector(".nav-btn").addEventListener('click', (event) =>{
  navBar.classList.add('open');
  console.log("clicked");
})

document.querySelector(".close-nav").addEventListener('click', (event) =>{
  navBar.classList.remove('open');
  console.log("unclicked");
})


// DEAL WITH THE HEADER SCROLL POSITION
// let lastScrollTop = 0;
// const header = document.querySelector('header');

// window.addEventListener('scroll', () => {
//   let scrollTop = window.scrollY || document.documentElement.scrollTop;
  
//   if (scrollTop > lastScrollTop) {
//     // Scroll Down - hide the header
//     header.classList.add('hidden');
//   } else {
//     // Scroll Up - show the header
//     header.classList.remove('hidden');
//   }
  
//   lastScrollTop = scrollTop;
// });


