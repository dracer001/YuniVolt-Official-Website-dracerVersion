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
    <div class="px-4 py-5 mb-5 text-center hero d-flex flex-column justify-content-center">
      <!-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
       <div class="hero-text">
        <h1 class="display-5 fw-bold hero-title">Uncover The Yunivolt <span class="chests-icon">`CHESTS`</span></h1>
        <div class="col-lg-6 mx-auto">
          <p class="lead mb-4">Our services are built on power and security you can trust. From CCTV and home automation to electrical and solar solutions, each C.H.E.S.T.S. offering ensures your space is powered, protected, and efficient—reliable solutions for all your needs.</p>
        </div>
       </div>

    </div>

    <section class="container my-5">
      <h2 class="pb-2 border-bottom">Our Services</h2>

      <div class="row row-cols-1 row-cols-md-2 g-4 service-container">
        <div class="col my-5">
          <div class="card h-100 service" id="cctv">
            <div class="card-icon">
              <img class="img-fluid" src="<?=ROOT?>/assets/media/icons/cctv-icon.png" alt="no img">
            </div>
            <div class="card-body text-center px-5 pt-4">
              <h5 class="card-title">CCTV Cameras Installtion</h5>
              <p class="card-text">Our CCTV camera installation service delivers tailored security solutions to meet your specific needs. We offer a range of options, including indoor and outdoor cameras, high-definition video, night vision, and motion detection.</p>
              <ul class="service-list">
                <li><i class="bi bi-check2-square"></i> Customized Systems</li>
                <li><i class="bi bi-check2-square"></i> High-Definition Video</li>
                <li><i class="bi bi-check2-square"></i> 24/7 Monitoring</li>
                <li><i class="bi bi-check2-square"></i> Remote Access</li>
                <li><i class="bi bi-check2-square"></i> Smart Integration</li>
                <li><i class="bi bi-check2-square"></i> Expert Installation</li>
              </ul>
            </div>
            <div class="card-footer px-5 pb-3 pt-0">
                <button class="btn-main w-100 mt-4 mx-auto book-btn" data-bs-service="cctv">Book Now</button>
            </div>
          </div>
        </div>

        <div class="col my-5">
          <div class="card h-100 service" id="home-automation">
            <div class="card-icon">
              <img class="img-fluid" src="<?=ROOT?>/assets/media/icons/home-automation.png" alt="Home Automation Icon">
            </div>
            <div class="card-body text-center px-5 pt-4">
              <h5 class="card-title">Home Automation</h5>
              <p class="card-text">Our home automation service transforms your living space into a smart home, enhancing convenience, security, and energy efficiency. We offer a variety of customizable solutions that allow you to control lighting, heating, security systems, and more, all from your smartphone or voice commands.</p>
              <ul class="service-list">
                <li><i class="bi bi-check2-square"></i> Smart Lighting</li>
                <li><i class="bi bi-check2-square"></i> Thermostat Control</li>
                <li><i class="bi bi-check2-square"></i> Security Integration</li>
                <li><i class="bi bi-check2-square"></i> Automated Blinds and Curtains</li>
                <li><i class="bi bi-check2-square"></i> Voice Control</li>
                <li><i class="bi bi-check2-square"></i> Expert Setup and Support</li>
              </ul>
            </div>
            <div class="card-footer px-5 pb-3 pt-0">
                <button class="btn-main w-100 mt-4 mx-auto book-btn" data-bs-service="home-automation">Book Now</button>
            </div>
          </div>
        </div>

        <div class="col my-5">
          <div class="card h-100 service" id="electrical-installation">
            <div class="card-icon">
              <img class="img-fluid" src="<?=ROOT?>/assets/media/icons/electrical-icon-white.png" alt="Electrical Installation and Ligthning Icon">
            </div>
            <div class="card-body text-center px-5 pt-4">
              <h5 class="card-title">Electrical Installation & Ligthning</h5>
              <p class="card-text">Our electrical installation and lighting services ensure safe and reliable solutions for your home or business. We specialize in providing expert installations and upgrades tailored to your needs.</p>
              <ul class="service-list">
                <li><i class="bi bi-check2-square"></i> Wiring and Circuit Installation</li>
                <li><i class="bi bi-check2-square"></i> Custom Lighting Design</li>
                <li><i class="bi bi-check2-square"></i> Energy-Efficient Lighting(LED)</li>
                <li><i class="bi bi-check2-square"></i> Safety Inspections</li>
                <li><i class="bi bi-check2-square"></i> Expert Troubleshooting</li>
                <li><i class="bi bi-check2-square"></i> Professional Installation</li>
              </ul>
            </div>
            <div class="card-footer px-5 pb-3 pt-0">
                <button class="btn-main w-100 mt-4 mx-auto book-btn" data-bs-service="electrical">Book Now</button>
            </div>
          </div>
        </div>

        <div class="col my-5">
          <div class="card h-100 service" id="solar-inverter">
            <div class="card-icon">
              <img class="img-fluid" src="<?=ROOT?>/assets/media/icons/solar.png" alt="Solar and Inverter System Icon">
            </div>
            <div class="card-body text-center px-5 pt-4">
              <h5 class="card-title">Solar and Inverter System</h5>
              <p class="card-text">Our electrical installation and lighting services ensure safe and relOur solar and inverter system services provide sustainable energy solutions designed to reduce costs and increase efficiency. We offer customized installations that deliver reliable power for homes and businesses.</p>
              <ul class="service-list">
                <li><i class="bi bi-check2-square"></i> Solar Panel Installation</li>
                <li><i class="bi bi-check2-square"></i> Inverter Systems</li>
                <li><i class="bi bi-check2-square"></i> Energy Storage Solutions</li>
                <li><i class="bi bi-check2-square"></i> Grid-Tied and Off-Grid Systems</li>
                <li><i class="bi bi-check2-square"></i> Maintenance and Monitoring</li>
                <li><i class="bi bi-check2-square"></i> Energy Audits</li>
              </ul>
            </div>
            <div class="card-footer px-5 pb-3 pt-0">
                <button class="btn-main w-100 mt-4 mx-auto book-btn" data-bs-service="solar">Book Now</button>
            </div>
          </div>
        </div>

        <div class="col my-5">
          <div class="card h-100 service" id="training">
            <div class="card-icon">
              <img class="img-fluid" src="<?=ROOT?>/assets/media/icons/training-icon.png" alt="Trining Icon">
            </div>
            <div class="card-body text-center px-5 pt-4">
              <h5 class="card-title">Training (Yunivolt Academy)</h5>
              <p class="card-text">Our electrical installation and lighting services ensure safe and relOur solar and inverter system services provide sustainable energy solutions designed to reduce costs and increase efficiency. We offer customized installations that deliver reliable power for homes and businessesOur training services equip individuals and businesses with the knowledge to manage and optimize modern energy, security, and automation systems. We offer hands-on training tailored to your needs, ensuring you're fully empowered to leverage the technology we install.</p>
              <ul class="service-list">
                <li><i class="bi bi-check2-square"></i> CCTV Installation Training</li>
                <li><i class="bi bi-check2-square"></i> Home Automation Training</li>
                <li><i class="bi bi-check2-square"></i> Solar and Inverter System Training</li>
                <li><i class="bi bi-check2-square"></i> Electrical Installation Training</li>
                <li><i class="bi bi-check2-square"></i> Software Engineering Training</li>
                <li><i class="bi bi-check2-square"></i> Customized Training Programs</li>
                <li><i class="bi bi-check2-square"></i> Certification</li>
              </ul>
            </div>
            <div class="card-footer px-5 pb-3 pt-0">
                <a href="<?=ROOT?>/?url=academy" class="btn btn-outline-main w-100 mt-4 mx-auto book-btn">Visit Academy</a>
            </div>
          </div>
        </div>

        <div class="col my-5">
          <div class="card h-100 service" id="software-packages">
            <div class="card-icon">
              <img class="img-fluid" src="<?=ROOT?>/assets/media/icons/software-packages.png" alt="Trining Icon">
            </div>
            <div class="card-body text-center px-5 pt-4">
              <h5 class="card-title">Software (Solar packages Installation)</h5>
              <p class="card-text">Our software packages offer advanced tools for managing solar energy systems, helping you monitor and optimize performance for maximum efficiency and savings. Designed for both residential and commercial use, our software makes energy management simple and effective.</p>
              <ul class="service-list">
                <li><i class="bi bi-check2-square"></i> Solar Monitoring Software</li>
                <li><i class="bi bi-check2-square"></i> Performance Analytics</li>
                <li><i class="bi bi-check2-square"></i> Remote System Management</li>
                <li><i class="bi bi-check2-square"></i> Alerts and Notifications</li>
                <li><i class="bi bi-check2-square"></i> Custom Integrations</li>
              </ul>
            </div>
            <div class="card-footer px-5 pb-3 pt-0">
              <button class="btn-main w-100 mt-4 mx-auto book-btn" data-bs-service="software">Book Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>
    </main>

    <aside>
      <div class="modal fade" id="service-booking-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Request for a service</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="service-booking-form">
                <div class="form-group mb-3">
                    <label for="service-select">Service</label>
                    <select id="service-select" class="form-select" name="service" disabled>
                      <option value="cctv">CCTV Cameras</option>
                      <option value="home-automation">Home Automation</option>
                      <option value="electrical">Electrical Installation & Ligthning</option>
                      <option value="solar">Solar&Inverter System</option>
                      <option value="software">Software(solar packages installation)</option>
                    </select>
                  </div>

                  <div class="form-group mb-3">
                    <label for="booker-email">Email</label>
                    <input type="email" id="booker-email" class="form-control" name="email" value="<?= $_SESSION["USER_DATA"]->email ?? "";?>" readonly>
                  </div>

                  <div class="form-group mb-3">
                    <label for="response-email">Response Email</label>
                    <input type="email" id="response-email" class="form-control" name="response_email" value="<?= $_SESSION["USER_DATA"]->email ?? "";?>">
                  </div>

                <div class="form-group mb-3">
                  <label for="book-message" class="form-label">message</label>
                  <textarea class="form-control" id="book-message" name="message" rows="3"></textarea>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-light text-success" id="sendWhatsapp">Send Via Whatsaap <i class="bi bi-whatsapp"></i>                  </button>
                  <button type="submit" class="btn-main" id="book-service-btn">Book this Service</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </aside>
          <!-- Modal -->

    <?php $this->view('includes/footer') ?>
   
</body>
</html>


<!-- End #main --> 



 
     