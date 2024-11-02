
    
    <footer class="mt-5 py-3 py-md-5 px-4" id="contacts">
        <div class="row my-3 justify-content-between">
  
          <div class="news-letter col-12 col-md-4">
            <h3 class=" h4 text-center text-md-start sub-header">Subscribe to our news letter</h3>
            <div class="d-flex newsletter-form mx-auto justify-content-center justify-content-lg-start">
              <div class="">
                <input type="email" class="form-control" id="newsletter">
              </div>
              <div class=" ms-2">
                <button type="submit" class="btn btn-outline-main">Subscribe</button>
              </div>
            </div>      
          </div>
          
          <div class="product-services col-6 col-md-4 mt-3 mt-md-0">
           <h3 class="h4 sub-header">Products & Service</h3>
            <ul class="">
              <li><a href="<?=ROOT?>/?url=services/#solar-inverter">Solar & Inveters</a> </li>
              <li><a href="<?=ROOT?>/?url=services/#cctv">CCTV Installation</a> </li>
              <li><a href="<?=ROOT?>/?url=services/#electrical-installation">Electrical Installation</a> </li>
              <li><a href="<?=ROOT?>/?url=services/#home-automation">Home Automation</a> </li>
              <li><a href="<?=ROOT?>/?url=services/#software-packages">Software (Solar Packages)</a> </li>
              <li><a href="<?=ROOT?>/?url=services/#training">Yunivolt Academy</a></li>
            </ul>
          </div>
          <div class="Academy course col-6 col-md-4 mt-3 mt-md-0">
            <h3 class="h4 sub-header">Academic Courses</h3>
            <ul class="">
              <?php foreach($all_courses as $course): ?>
                <li><a href="<?=ROOT?>/?url=academy/#course-<?=$course->course_id?>"><?=$course->title?></a> </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        

        <div class="row align-items-center">
          
          <div class="company-footer col-6 col-md-4 d-none d-md-block">
            <div class="d-flex align-items-center">
              <img src="<?=ROOT?>/assets/media/icons/logo.png" alt="Logo" width="40" class="d-inline-block align-text-top">
              <div class="company-title d-flex flex-column align-items-center justify-content-center">
                <span class="company-name">Yunivolt</span>
                <span class="company-slogan">(Power & Digital Security)</span>
              </div>
            </div>
          </div>
          
          <div class="socials d-flex col-6 col-md-4">
     
              <i class="bi bi-facebook"></i>
              <i class="bi bi-twitter-x"></i>
              <i class="bi bi-linkedin"></i>
              <i class="bi bi-whatsapp"></i>
          
          </div>
          
          <div class="copyright text-center text-md-start col-md-4 mt-3">
            <p class="">All right reserved | &copy; yunivolt 2024</p>
            <p class="design-tm text-small">designed by dracerTech</p>
          </div>
          
        
        </div>
        
        
    </footer>