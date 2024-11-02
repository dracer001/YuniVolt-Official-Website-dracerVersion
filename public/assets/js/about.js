console.log("hello about");
const collectionImg = document.querySelectorAll(".collection-img");



let slideIndex = 1;

function showSlides(id, n) {
  let i;
  let collection = document.getElementById(id);
  console.log(collection)
  let slides = collection.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}

function selectCollection(id){
  console.log("id", id);
  const slideCollection = document.querySelectorAll(".slide-container");
  slideCollection.forEach(collection =>{
    (collection.id === id) ? collection.classList.remove('d-none') : collection.classList.add('d-none')
  })
  collectionImg.forEach(dots =>{
    (dots.getAttribute("data-collection") === id) ? dots.classList.add("active") : dots.classList.remove("active");
  })

}

collectionImg.forEach(e =>{
  e.addEventListener("click", ()=>{
    id = e.getAttribute("data-collection");
    selectCollection(id);
    showSlides(id, slideIndex=1);
  })
})

document.querySelectorAll(".move-slide").forEach(e =>{
    e.addEventListener("click", ()=>{
      id = e.getAttribute("data-collection");
      (e.classList.contains("prev")) ? showSlides(id, slideIndex-=1) : showSlides(id, slideIndex+=1) 
    })
  })

selectCollection(document.querySelector(".slide-container").id);
showSlides(document.querySelector(".slide-container").id, slideIndex);
