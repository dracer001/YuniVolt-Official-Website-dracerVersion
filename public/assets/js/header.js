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


// For adding item to calculator container
const calcItem = document.getElementById('calc-item').cloneNode(true);
const calcList = document.getElementById('calc-list')
document.querySelector('.remove-calc-item').addEventListener('click', (event)=>{
  event.target.parentNode.parentNode.remove()
})


document.querySelector('.add-calc-item').addEventListener('click', ()=>{
  let cloneCalcItem = calcItem.cloneNode(true)
  cloneCalcItem.querySelector('.remove-calc-item').onclick = ()=>{
    cloneCalcItem.remove()
  }
  calcList.appendChild(cloneCalcItem)
})





