function toggleOn(){   
  document.getElementById("navIcon1").style.display = "none"; 
  document.getElementById("navIcon2").style.display = "block"; 
  document.getElementById("navLinkWrapper").style.display = "block"; 
  document.getElementById("navMenu").style.width = "50%";    

}

function toggleOff(){
document.getElementById("navLinkWrapper").style.display = "none"; 
document.getElementById("navMenu").style.width = "0";  
document.getElementById("navIcon1").style.display = "block"; 
  document.getElementById("navIcon2").style.display = "none"; 
}

function mobileNavController(elementId){ 
  document.getElementById(elementId).scrollIntoView({ behavior: 'smooth' }); 

  var side_nav_box = document.getElementById("side-nav-mobile-overlay-bg-visitor"); 
  var side_nav = document.getElementById("side-nav-mobile-visitor"); 
  var alert_nav = document.getElementById("alert-nav-visitor");
  var hamburger_IMG = document.getElementById("hamburger-visitor");
  if (window.getComputedStyle(alert_nav).display === "none") {
      hamburger_IMG.src = "http://localhost/success/IT_big_thing/public/assets/images/close-nav-menu.png";
      side_nav_box.style.display = "block"; 
      side_nav.style.width = "50%"; 
      alert_nav.style.display = "initial";  
    } else{
      side_nav_box.style.display = "none"; 
      side_nav.style.width = "0"; 
      alert_nav.style.display = "none"; 
      hamburger_IMG.src = "http://localhost/success/IT_big_thing/public/assets/images/hamburger.png";  
  }
}


function openNavChild(activeDiv){
  var i;
  var x = document.getElementsByClassName("js-navChildTabs");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }

  var child_nav = document.getElementById(activeDiv);  
  if (window.getComputedStyle(child_nav).display === "none") { 
    child_nav.style.display = "block";   
  }else{ 
    child_nav.style.display = "none"; 
  }
} 

function toggleVisitor(){  
  var side_nav_box = document.getElementById("side-nav-mobile-overlay-bg-visitor"); 
  var side_nav = document.getElementById("side-nav-mobile-visitor"); 
  var alert_nav = document.getElementById("alert-nav-visitor");
  var hamburger_IMG = document.getElementById("hamburger-visitor");
  if (window.getComputedStyle(alert_nav).display === "none") {
      hamburger_IMG.src = "http://localhost/success/IT_big_thing/public/assets/images/close-nav-menu.png";
      side_nav_box.style.display = "block"; 
      side_nav.style.width = "50%"; 
      alert_nav.style.display = "initial";  
    } else{
      side_nav_box.style.display = "none"; 
      side_nav.style.width = "0"; 
      alert_nav.style.display = "none"; 
      hamburger_IMG.src = "http://localhost/success/IT_big_thing/public/assets/images/hamburger.png";  
    }
}