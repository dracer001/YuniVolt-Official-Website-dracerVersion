// For removing item to calculator container
const calcItem = document.getElementById('calc-item').cloneNode(true);
const calcList = document.getElementById('calc-list')


const consumptionTime = document.querySelector('.load-time')
consumptionTime.addEventListener('input', (event)=>{
  if(Number(event.target.value) > 0 && Number(document.querySelector('.total-load').value) > 0)  clacBtn.disabled = false
})

const clacBtn = document.querySelector('.clac-btn')
clacBtn.disabled = true;

const rmvItemBtn = document.querySelector('.remove-calc-item')
rmvItemBtn.disabled = true;
rmvItemBtn.addEventListener('click', rmvItem)

// For adding item to calculator container
const addItemBtn = document.querySelector('.add-calc-item')
addItemBtn.disabled = true;
addItemBtn.addEventListener('click', ()=>{

  let cloneCalcItem = calcItem.cloneNode(true)
  cloneCalcItem.querySelector('.remove-calc-item').addEventListener('click', rmvItem)
  cloneCalcItem.querySelector('.watt-input').addEventListener('input', addLoad)
  cloneCalcItem.querySelector('.quantity-input').addEventListener('input', addLoad)
  calcList.appendChild(cloneCalcItem)
  addItemBtn.disabled = true;
  rmvItemBtn.disabled = false;

})

document.querySelector('.watt-input').addEventListener('input', addLoad)
document.querySelector('.quantity-input').addEventListener('input', addLoad)

function rmvItem(event) {
  console.log(event.target.parentNode.parentNode)
  event.currentTarget.parentNode.parentNode.remove()
  let rmvItemBtns = document.querySelectorAll('.remove-calc-item')

  if (rmvItemBtns.length == 1) {
    rmvItemBtns[0].disabled = true;
  }
  addLoad()
}


function addLoad() {
  addItemBtn.disabled = false;
  let totalLoad = 0.00;
  document.querySelectorAll('.watt-input').forEach(input =>{
    let quantity = Number(input.parentNode.parentNode.querySelector('.quantity-input').value)
    totalLoad += Number(input.value*quantity);
  })
  document.querySelector('.total-load').value=totalLoad
  if (totalLoad > 0 && Number(consumptionTime.value) > 0 ) clacBtn.disabled = false
  console.log("total load", totalLoad)
}

// Calculating the Solar Usage blh blah blah

  /*__________Solar Power Calculator | PROPERTY______________ **/ 
clacBtn.onclick = generateSolarSystem


  function generateSolarSystem() {  
    console.log("generator strated")
    const totalWat = document.querySelector('.total-load').value
    const loadTime = document.querySelector('.load-time').value; 

    const totalPanelsToUse = 5; 
 
    //CALCULATING THE BATTERIES.
    var totalLoadConsumption = parseInt(totalWat) * parseInt(loadTime); 
    var batteriesToUse = totalLoadConsumption / 1800; 

    //CALCULATING THE PANELS
    var singleBattery_Ah = 200; 
    var singlePanel_C_Output = 16.66;
    var total_battery_Ah = Math.trunc(batteriesToUse)*singleBattery_Ah;
    var totalPanel_C_Output = singlePanel_C_Output.toFixed(2)*totalPanelsToUse;
    var chargeDuration = total_battery_Ah/totalPanel_C_Output;
    var chargeDurationInHour = chargeDuration.toFixed(2);  

    //Ouput Data
    document.querySelector('.loads').innerText = totalWat;
    document.querySelector('.time-usage').innerHTML = loadTime;
    document.querySelector('.battery-amount').innerHTML = Math.trunc(batteriesToUse)+" pieces of 200Ah batteries";
    document.querySelector('.panel-amount').innerHTML = Math.trunc(totalPanelsToUse)+" pieces of 300W panels.";
    document.querySelector('.charging-duration').innerHTML = "Charging duration "+chargeDurationInHour+" hours.";
    document.querySelector('.result-display').style.display = "block";
    console.log("finished generation")
  }


  /*__________Solar Power Calculator | CLOSED______________ **/ 

