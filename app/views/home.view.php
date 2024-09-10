<!DOCTYPE html>
<html lang="en">
<head>
   <!-- include head meta-data -->
   <?php $this->view('includes/head', $data) ?>
</head>
<body>
   <!-- includes header plus navigation -->
   <?php $this->view('includes/nav', $data) ?>
   <main>
        <div class="hero">
          <img class="hero-img" src="<?=ROOT?>/assets/media/images/hero.webp" alt="">
          <div class="hero-text p-3">
            <p class="h2">Transforming spaces with innovative energy solutions, advanced security, and intelligent systems <span class="hero-caption"> - experience the unseen power of</span> <br> <span class="hero-caption-title"> Yunivolt</span></p>
          </div>
        </div>
        
        <section class="my-5 my-lg-5 container" id="about-us">
          <div class="row align-items-center">
            
            <div class="col-12 col-lg-8">
              <h2 class="text-center sub-header mb-1"> Who we are.</h2>
              <div class="header-underline mx-auto mt-0 mb-3"></div>
              <p class="px-2 about-content">
                At Yunivolt, we specialize in integrating advanced energy, security, and automation solutions to enhance modern living. With expertise in solar installations, electrical systems, CCTV surveillance, and smart home technology, we are committed to delivering reliable, innovative, and tailored services that meet the unique needs of our clients. Our mission is to provide not just power and security, but peace of mind through seamless and sustainable solutions. Whether you’re looking to upgrade your home’s energy efficiency, enhance security, or simplify your life with automation, Yunivolt is your trusted partner.
              </p>
              <a href="<?=ROOT?>/?url=about" class="btn-link ps-2">Learn more...</a>
            </div>
            <div class="d-none d-lg-block col-lg-4">
              <img class="img-fluid ronded-3 " src="<?=ROOT?>/assets/media/images/engineering.jpg" alt="emplyee images">
            </div>
          </div>
        </section>
        
        <section class="container my-5" >
          <h2 class="text-center sub-header mb-1">Products & Services</h2>
          <div class="header-underline mx-auto mt-0 mb-3"></div>
          <div class="border rounded shadow row align-items-center p-3 p-md-5 mb-3 services">
            <h3 class="text-center">Explore Yunivolt's CHESTS</h3>
            <p class="text-center">
              At Yunivolt, we offer a diverse range of services that blend power, security, and convenience, giving our customers the freedom to seamlessly carry out their day-to-day activities. Our services can be summed up as treasured "CHEST," where each letter represents a key aspect of what we hold dear
            </p>
            <div class="d-flex chests-container justify-content-center">
              <div class="chests"><span class="chests-icon">C</span> CCTV Camera</div>
              <div class="chests"><span class="chests-icon">H</span>Home Automation</div>
              <div class="chests"><span class="chests-icon">E</span>Electrical Installation</div>
              <div class="chests"><span class="chests-icon">S</span>Solar & Inverter system</div>
              <div class="chests"><span class="chests-icon">T</span>Training</div>
              <div class="chests"><span class="chests-icon">S</span>Software (solar packages Installation)</div>
            </div>
            <a href="" class="btn btn-c-primary w-auto m-auto my-3">Uncover Our CHESTS</a>
          </div>
          
          <div class="border rounded shadow row align-items-center p-3 mb-3 justify-content-between">
            <div class="col-12 col-lg-5 order-lg-2">
              <img class="img-fluid" src="<?=ROOT?>/assets/media/images/learneng.jpg" alt="academy photo">
            </div>
            <div class="col-12 col-lg-6 my-3 row align-items-center">
              <h3 class="text-center">Yunivolt Academy</h3>
              <p class="text-center acad-intro">
              Elevate your skills with Yunivolt Academy’s expert-led training programs. Whether you're a beginner or a pro, our comprehensive courses are designed to provide you with practical knowledge and hands-on experience. Join us to master new technologies, advance your career, and stay ahead in the fast-evolving tech world.
              </p>
              <a href="" class="btn btn-c-outline-primary mx-auto w-auto">Visit Our Academy</a>
            </div>
          </div>
          
          <div class=" shadow shopping-container">
            <img class="shopping-bg" src="<?=ROOT?>/assets/media/images/shopping1.jpg" alt="shopping cart">
            <div class="shopping-text p-3 p-md-5">
              <p class="h2">Now Open</p>
              <p class="h5 display-6">Yunivolt Shopping Mall</p>
              <p>
              Get all your electrical gadgets from inverter batteries to solar panels to embedded system components.
              </p>
              <a href="" class="btn btn-b-primary">Shop Now</a>
             </div>
          </div>
        </section>
   
        <section class="container">
          <div class="power-calculator-landing">
            <h2 class="brand-cl-blue">Solar System Calculator</h2>
            <p class="pd-lr20px">
                Find out your solar needs based on your home or office appliances.
            </p>
          </div> 
      <div class="container"> 
         <p class="warningTag">Make sure your inputs are correct!</p>
         <label for="electricLoad">Electric Load in decimal:</label>
         <input type="number" id="electricLoad" step="0.01" min="0" required>
         
         <div class="ds-flex">
           <div class="wd50pc">
            <label for="electronic">Electronic Load:</label>
            <input type="text" id="electronic" style="width: 120px;" placeholder="e.g Television" required>
           </div> 
           <div class="wd25pc">
            <label for="electronicWat">Wat:</label><br>
            <input type="number" id="electronicWat" style="width: 40px; height: 8px;" min="10" value="0" required>
           </div> 
           <div class="wd20pc txtAli-center mg-left30px pd-top5px">
            <button class="btn-spc-small" onclick="addElectricLoad()">Add</button>
            <button class="btn-spc-small mg-top5px" onclick="clearElectricLoad()">Reset</button>
           </div>
         </div>

         
         <select id="questionType" onchange="addInputField()" name="answer_type">
            <option value="none" disabled>-Select-</option>
            <option value="text">Text</option>
            <option value="select">Select</option>   
         </select><br><br>

         <div id="loadsContainer" class="ds-none"></div> 
         <div class="ds-flex">
            <label class="wd250px ht30px pd-top10px">Total Load (wat):</label>
           <input type="number" id="watHolder" value="0" disabled required>
         </div>  

         <div class="ds-flex">
           <div class="wd60pc">
            <label for="loadTime">Power Time (Hours):</label>
            <input type="number" id="loadTime" style="width: 120px; height: 8px;" required> 
           </div>
           <div class="wd30pc">
            <label for="loadTime">Panels:</label>
            <input type="number" id="panels" style="width: 80px; height: 8px;" value="4" required> 
           </div>  
         </div>  

        <button class="mg-bottom20px" onclick="generateSolarSystem()">Calculate</button> 
      </div> 

      <div id="resultWrapper" class="ds-none">
         <h2 class="brand-cl-black ft-size19px">RESULT</h2>
           <p id="param33" style="padding-bottom: 10px; font-size:16px;">
              Your load is <span id="loads"></span>
              W, and you want the setup to carry it for <span id="timeUsage"></span>
              hours. Below is what you need:
           </p>
           <p id="param44" style="padding-bottom: 10px;"></p> 
           <p id="param55" style="padding-bottom: 10px;"></p>  
           <p id="param66" style="padding-bottom: 10px;"></p>   
           <div>
              <h2 class="txtAli-center brand-cl-black">Need This Above Setup?</h2>
              <p>Automatically send it to us - by inputing your email and click "Email Now"</p>
              
               <div class="ds-flex"> 
                  <div class="wd60pc">
                   <form action="" class="mg-top20px">
                    <label for="loadTime">Input Your Email:</label>
                    <input type="email" style="height: 20px;" required> 
                   </form>
                  </div>  
                  <div class="wd30pc" style="margin-left: 5%;">   
                    <a href="mailto:yunivolttech@gmail.com?subject=YuniVolt - I Need This Setup&body=Hi, I am interested in getting this setup:"><button class="wd100px mg-top31px">Email Now!</button></a>
                  </div>
               </div>  
            </div>
      </div>
      </section>
   
    </main>

    <?php $this->view('includes/footer') ?>
   
</body>
</html>


<!-- End #main --> 
 
     