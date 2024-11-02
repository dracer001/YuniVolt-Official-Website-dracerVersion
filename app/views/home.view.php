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
            <p class="h2 display-6">Transforming spaces with innovative energy solutions, advanced security, and intelligent systems <span class="hero-caption"> - experience the unseen power of</span> <br> <span class="hero-caption-title"> Yunivolt</span></p>
          </div>
        </div>
        
        <section class="my-5 my-lg-5 container" id="about-us">
          <div class="row align-items-center">
            
            <div class="col-12 col-lg-8">
              <h2 class="text-center sub-header mb-1"> Who we are.</h2>
              <div class="header-underline mx-auto mt-0 mb-3"></div>
              <p class="px-2 about-content">
                At Yunivolt, we specialize in integrating advanced energy, security, and automation solutions to enhance modern living. With expertise in solar installations, electrical systems, CCTV surveillance, and smart home technology, we are committed to delivering reliable, innovative, and tailored services that meet the unique needs of our clients.
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
          <div class="border rounded shadow row align-items-center py-5 px-3 px-md-5 mb-3 services">
            <h3 class="text-center sub-header">Explore Yunivolt's CHESTS</h3>
            <p class="text-center service-text">
              At Yunivolt, we offer a diverse range of services that blend power, security, and convenience, giving our customers the freedom to seamlessly carry out their day-to-day activities. Our services can be summed up as treasured "CHEST," where each letter represents a key aspect of what we hold dear
            </p>
            <div class="d-flex chests-container justify-content-around">
              <a href="<?=ROOT?>/?url=services#cctv" class="chests-link chests"><div class=""><span class="chests-icon">C</span>CTV Camera</div></a>
              <a href="<?=ROOT?>/?url=services#home-automation" class="chests-link chests"><div class=""><span class="chests-icon">H</span>ome Automation</div></a>
              <a href="<?=ROOT?>/?url=services#electrical-installation" class="chests-link chests"><div class=""><span class="chests-icon">E</span>lectrical Installation</div></a>
              <a href="<?=ROOT?>/?url=services#solar-inverter" class="chests-link chests"><div class=""><span class="chests-icon">S</span>olar & Inverter system</div></a>
              <a href="<?=ROOT?>/?url=services#training" class="chests-link chests"><div class=""><span class="chests-icon">T</span>raining</div></a>
              <a href="<?=ROOT?>/?url=services#software-packages" class="chests-link chests"><div class=""><span class="chests-icon">S</span>oftware (solar packages Installation)</div></a>
            </div>
            <a href="<?=ROOT?>/?url=services" class="chests-btn btn-lg btn-main w-auto m-auto my-3">Uncover Our CHESTS</a>
          </div>
          
          <div class=" academy border rounded shadow row align-items-center p-3 py-4 mb-3 justify-content-between">
            <div class="col-12 col-lg-5 order-lg-2">
              <img class="img-fluid" src="<?=ROOT?>/assets/media/images/learneng.jpg" alt="academy photo">
            </div>
            <div class="col-12 col-lg-6 my-3 row align-items-center">
              <h3 class="text-center sub-header">Yunivolt Academy</h3>
              <p class="text-center acad-intro ">
              Elevate your skills with Yunivolt Academy’s expert-led training programs. Whether you're a beginner or a pro, our comprehensive courses are designed to provide you with practical knowledge and hands-on experience. Join us to master new technologies, advance your career, and stay ahead in the fast-evolving tech world.
              </p>
              <a href="<?=ROOT?>/?url=academy" class="btn-outline-main mx-auto w-auto">Visit Our Academy</a>
            </div>
          </div>
        </section>
        <section class="container adds my-5">
          <div class="album-container mb-3">
            <h3 class="text-center">Let Our Work Speak For Itself</h3>
            <div class="header-underline mx-auto mt-0 mb-3"></div>
            <a href="<?=ROOT?>/?url=about#" id="album-slides" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="<?=ROOT?>/assets/media/gallary/gal-img1.jpg" class="d-block rounded-3" alt="...">
                  <div class="album-caption rounded-bottom">Lagos Ikeja</div>
                </div>
                <div class="carousel-item">
                  <img src="<?=ROOT?>/assets/media/gallary/gal-img2.jpg" class="d-block rounded-3" alt="...">
                  <div class="album-caption rounded-bottom">Lagos Ikeja</div>

                </div>
                <div class="carousel-item">
                  <img src="<?=ROOT?>/assets/media/gallary/gal-img3.jpg" class="d-block rounded-3" alt="...">
                  <div class="album-caption rounded-bottom">Lagos Ikeja</div>
                </div>
              </div>
            </a>
          </div>

          <div class=" shadow shopping-container">
            <img class="shopping-bg" src="<?=ROOT?>/assets/media/images/shopping1.jpg" alt="shopping cart">
            <div class="shopping-text p-3 p-md-5">
              <p class="h2">Now Open</p>
              <p class="h5 display-6">Yunivolt Shopping Mall</p>
              <p>
              Get all your electrical gadgets from inverter batteries to solar panels to embedded system components.
              </p>
              <a href="<?=ROOT?>/?url=e-shop" class="btn btn-outline-primary">Shop Now</a>
             </div>
          </div>
        </section>
   
        <section class="container" id="solar-calc">
          <h2 class="text-center sub-header mb-1">Solar System Calculator</h2>
          <div class="header-underline mx-auto mt-0 mb-3"></div>
          <p class="text-center">
              Find out your solar needs based on your home or office appliances.
          </p>
          <div class="row row-cols-lg-2 row-cols-1">
            <div class="col">
              <h3 class="text-center sub-header">Calculator</h3>
              <div class="calc border rounded-3 py-3 px-3">
                <table>
                  <thead>
                    <tr class="row align-items-end g-0">
                      <th class="col-6">Appliances/Item</th>
                      <th class="col-3 text-break">Consumption (Watts)</th>
                      <th class="col-2">Quantity</th>
                      <th class="col-1"></th>
                    </tr>
                  </thead>
                  <tbody class="calc-list" id="calc-list">
                    <tr class="row" id="calc-item">
                      <td class="col-6">
                       <input type="text" class="form-control form-control-sm" name="" id="" placeholder="e.g bulb">
                      </td>
                      <td class="col-3">
                       <input type="number" class="form-control form-control-sm watt-input" name="" id="" placeholder="0.00">
                      </td>
                      <td class="col-2">
                       <input type="number" class="form-control form-control-sm quantity-input" name="" id="" value="1">
                      </td>
                      <td class="col-1">
                        <button type="button" class="btn remove-calc-item"><i class="bi bi-x"></i></button>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot class=" my-3">
                    <tr class="row justify-content-end mb-3">
                      <td class="col-3">
                      <button type="button" class="btn btn-outline-main add-calc-item w-100"><i class="bi bi-plus"></i>add</button>
                      </td>
                    </tr>
                    <tr class="row mb-2">
                      <td class="col-12">
                        <div class="d-flex justify-content-between"><b>Total load (Watts): </b><input type="number" class="form-control form-control-sm total-load w-auto" value="0.00"  readonly></div>
                      </td>
                    </tr>
                    <tr class="row mb-3">
                      <td class="col-12">
                        <div class="d-flex justify-content-between">
                          <b>Power time per day (Hours): </b>
                          <input type="number" class="load-time form-control w-auto form-control-sm">
                        </div>
                      </td>
                    </tr>
                  </tfoot>
                </table>
                <button class="btn btn-main clac-btn">Calculate</button>
              </div>
            </div>
            <div class="col">
              <h3 class="text-center sub-header">Results</h3>
              <div class="result rounded-3">
                <div class="result-display p-3 py-5">
                  <p>Your load is toatal load = <span class="result-info loads py-1 px-3"></span> Watts</p>
                  <p>Time duration per day = <span class="result-info time-usage py-1 px-3"></span> hours</p>
                  <p class="mt-3">Here are the following setup required</p>
                  <p class="result-info battery-amount"></p>
                  <p class="result-info panel-amount"></p>
                  <p class="result-info charging-duration"></p>
                  <div class="send-result d-flex mt-5">
                    <button class="btn-outline-main"><i class="bi bi-file-earmark-arrow-down-fill"></i> pdf</button>
                    <button class="btn-main"><i class=" bi bi-whatsapp"></i> message</button>
                    <button class="btn-main "><i class="bi bi-envelope-fill"></i> message</button>
                  </div>
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
 
     