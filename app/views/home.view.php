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
          <h2 class="text-center sub-header mb-1">Solar System Calculator</h2>
          <div class="header-underline mx-auto mt-0 mb-3"></div>
          <p class="text-center">
              Find out your solar needs based on your home or office appliances.
          </p>
          <div class="row row-cols-lg-2 row-cols-1">
            <div class="col">
              <h3 class="text-center">Calculator</h3>
              <div class="calc border rounded-3 py-3 px-2 py-lg-3">
                <table>
                  <thead>
                    <tr class="row align-items-center">
                      <th class="col-6">Appliances/Item</th>
                      <th class="col-3 text-break">Consumption (Watts)</th>
                      <th class="col-2">Quantity</th>
                      <th class="col-1"></th>
                    </tr>
                  </thead>
                  <tbody class="calc-list" id="calc-list">
                    <tr class="row align-items-center" id="calc-item">
                      <td class="col-6">
                       <input type="text" class="form-control" name="" id="" placeholder="e.g bulb">
                      </td>
                      <td class="col-3">
                       <input type="number" class="form-control watt-input" name="" id="" placeholder="0.00">
                      </td>
                      <td class="col-2">
                       <input type="number" class="form-control quantity-input" name="" id="" value="1">
                      </td>
                      <td class="col-1">
                        <button type="button" class="btn remove-calc-item"><i class="bi bi-x"></i></button>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot class="">
                    <tr class="row justify-content-end mt-3">
                      <td class="col-3">
                      <button type="button" class="btn btn-g-primary add-calc-item w-100"><i class="bi bi-plus"></i>add</button>
                      </td>
                    </tr>
                    <tr>
                      <td >
                        <p class="d-flex">Total load (Watts): <input type="text" class="form-control total-load" value="0.00"  readonly></p>
                      </td>
                    </tr>
                  </tfoot>
                </table>
                <div>
                  <label for="">Power time per day (Hours)</label>
                  <input type="text">
                </div>
                <button class="btn btn-g-primary">Calculate</button>
              </div>
            </div>
            <div class="col">
              <h3 class="text-center">Results</h3>
              <div class="result rounded-3">

              </div>
            </div>
          </div>
          <div class="send-result">

          </div>
      </section>
   
    </main>

    <?php $this->view('includes/footer') ?>
   
</body>
</html>


<!-- End #main --> 
 
     