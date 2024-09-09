//_____GENERAL | PROPERTY_______________________________________    
function profileTabController(tabName) {
    var i;
    var x = document.getElementsByClassName("profileTab");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    document.getElementById( tabName).style.display = "block";  
  }
   
//_____ALL Window Onload | PROPERTY_______________________________________     


 function controlPopup(sectionID){
    var activePage = document.getElementById(sectionID); 
    if (window.getComputedStyle(activePage).display === "none") { 
        activePage.style.display =  "block"; 
        toggleOff();
    }else{
        activePage.style.display =  "none";  
    }
 }

  
/*__________Tab Control | PROPERTY________________  
 * HOW I SOLVED AND BUILT THE TAB CONTROL SYSTEM: 
 * I am using the function to collect the current active tab on click (by requesting a param).
 * In line 2 of the function am getting all element with the class name "js-tab"
 * and hidding them using "display:none;", so lastly am showing the active class.  
 * 
 **/
  function tabController(tabName) {
    var i;
    var x = document.getElementsByClassName("js-sec-tabs");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    document.getElementById(tabName).style.display = "block"; 
    toggleOff();
  }  

  function getLink_NT(url) {
    window.open(url, "_blank");
  }  

  /*__________Solar Power Calculator | PROPERTY______________ **/ 
  function addElectricLoad() {
    const electronic = document.getElementById('electronic').value;
    const electronic_wat = document.getElementById('electronicWat').value;
    const loadsContainer = document.getElementById('loadsContainer');
    const watHolder = document.getElementById('watHolder').value; 
    const loadTime = document.getElementById('loadTime').value; 

    // Clear previous options
    //loadsContainer.innerHTML = '';  
    const span = document.createElement('span');
    span.textContent = `${electronic} ${electronic_wat}`; 
    span.classList.add("dynaLoads");
    loadsContainer.style.display = "block";   
    loadsContainer.appendChild(span);   
 
    var totalSumOfWat = parseInt(watHolder) + parseInt(electronic_wat); 
    document.getElementById('watHolder').value = totalSumOfWat; 
     
  }

  function clearElectricLoad() { 
    const loadsContainer = document.getElementById('loadsContainer');  

    // Clear previous options
    loadsContainer.innerHTML = '';
    loadsContainer.style.display = "none";  
    document.getElementById('watHolder').value = 0;
  }

  function generateSolarSystem() {  
    const totalWat = document.getElementById('watHolder').value;
    const loadTime = document.getElementById('loadTime').value; 
    const totalPanelsToUse = document.getElementById('panels').value; 
 
    //CALCULATING THE BATTERIES.
    var unknownParam1 = parseInt(totalWat) * parseInt(loadTime); 
    var batteriesToUse = unknownParam1 / 1800; 

    //CALCULATING THE PANELS
    var singleBattery_Ah = 200; 
    //var panel_300W = 300;
    //var const_12V = 18;
    var singlePanel_C_Output = 16.66;
    var total_battery_Ah = Math.trunc(batteriesToUse)*singleBattery_Ah;
    var totalPanel_C_Output = singlePanel_C_Output.toFixed(2)*totalPanelsToUse;
    var chargeDuration = total_battery_Ah/totalPanel_C_Output;
    var chargeDurationInHour = chargeDuration.toFixed(2);  
    //var chargeDurationInHour = Math.trunc(chargeDuration);  

    //Ouput Data
    document.getElementById("resultWrapper").style.display = "block"; 
    document.getElementById('loads').innerHTML = totalWat;
    document.getElementById('timeUsage').innerHTML = loadTime;
    document.getElementById('param44').innerHTML = Math.trunc(batteriesToUse)+" pieces of 200Ah batteries";
    document.getElementById('param55').innerHTML = Math.trunc(totalPanelsToUse)+" pieces of 300W panels.";
    document.getElementById('param66').innerHTML = "Charging duration "+chargeDurationInHour+" hours.";
  }


  /*__________Solar Power Calculator | CLOSED______________ **/ 

