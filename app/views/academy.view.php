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
          <img class="hero-img" src="<?=ROOT?>/assets/media/images/acad_bg.jpg" alt="">
          <div class="hero-text p-3">
            <p class="h2">Transforming spaces with innovative energy solutions, advanced security, and intelligent systems—experience the unseen power of Yunivolt.</p>
          </div>
        </div>
        
        <section class="my-5 my-lg-5 container" id="about-us">
          <h2 class="text-center sub-header mb-1"> What is Yunivolt Academy</h2>
          <div class="header-underline mx-auto mt-0"></div>
          <div class="row align-items-center">
            <div class="col-12 col-lg-6">
              <p class="px-2 acad-intro-content">
              At Yunivolt Academy, we are committed to empowering learners with practical skills in modern technology fields, including solar energy, security systems, home automation, and more. Our hands-on training programs are designed for both beginners and professionals, equipping them with the knowledge and confidence to thrive in a rapidly evolving world. Join us and take the first step towards a brighter, more sustainable future!
              </p>
            </div>
            
            <div class="col-12 col-lg-6 row g-3 acad-mission">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card mb-3 h-100">
                  <div class="card-header">Our Mission</div>
                <div class="card-body">
                  <p class="card-text">To equip individuals with cutting-edge technical skills in renewable energy, security, and automation, fostering a knowledgeable workforce ready to lead in a sustainable, tech-driven world.</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-12 acad-vision">
              <div class="card statement mb-3 h-100">
                <div class="card-header">Our Vision</div>
                <div class="card-body">
                  <p class="card-text">To be a premier training hub, inspiring innovation and empowering communities through accessible, high-quality technical education in modern power and digital security solutions.</p>
                </div>
              </div>
            </div>
            </div>
          </div>
        </section>
        
        <section class="container course-section" >
          <h2 class="text-center sub-header mb-1">Course Overview</h2>
          <div class="header-underline mx-auto mt-0 mb-3"></div>
          <?php if ($courses): ?>
            <p class="text-center acad-intro-content mx-auto">
            Our courses at Yunivolt Academy are crafted to equip you with real-world skills in solar, security, automation, and more. Dive into our training programs and gain the expertise to power and protect the future.
            </p>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
              <?php foreach($courses as $course): ?>
                <div class="col course" id="course-<?=$course->course_id?>">
                  <div class="card h-100">
                    <img src="<?=ROOT?>/assets/media/uploads/courses/<?=$course->img_thumbnail?>" class="card-img-top course-img" alt="..."/>
                      <div class="card-body">
                        <h5 class="card-title mb-3"><?=$course->title?></h5>
                        <p class="card-text"><?=$course->description?></p>
                      </div>
                      <div class="card-footer">
                        <?php if (isset($course->registered) && $course->registered): ?>
                          <button class="btn btn-success" diabled>Registered</button>
                        <?php else: ?>
                          <button class="btn-main course-reg-btn" data-course-title="<?=$course->title?>" data-course-id="<?=$course->course_id?>">Sign Up</button>
                          <button class="btn btn-outline-success whatsapp-course-reg" data-course-title="<?=$course->title?>" data-course-id="<?=$course->course_id?>"><i class="bi bi-whatsapp"></i> Sign Up</button>
                          <?php endif ?>
                      </div>
                  </div>
                </div>
              <?php endforeach?>
            </div>
          <?php else: ?>
            <p class="info text-center h3">No Course Available</p>
          <?php endif; ?>
        </section>
   
        <section class="curriculum-section my-5 p-lg-5 p-4">
          <h2 class="text-center sub-header mb-1 text-white">Learning Without Limits</h2>
          <div class="header-underline mx-auto mt-0 mb-3"></div>
          <div class="curriculum-container row row-cols-lg-2">
            <div class="curriculum-box">
              <div class="curriculum-item rounded-3 mx-auto">
                <div class="curriculum-icon rounded-3"><img src="<?=ROOT?>/assets/media/images/in-person-class-tp.png" alt="" class="img-fluid"></div>
                <div class="curriculum-header rounded-top p-2">In-Person Classes</div>           
                <div class="curriculum-text p-2">Experience face-to-face learning in a structured classroom environment, guided by expert instructors ready to provide personalized support.</div>
              </div>
            </div>
            
            <div class="curriculum-box">
              <div class="curriculum-item rounded-3 mx-auto">
                <div class="curriculum-icon rounded-3"><img src="<?=ROOT?>/assets/media/images/e-learning-tp.png" alt="" class="img-fluid"></div>
                <div class="curriculum-header rounded-top p-2"> Online Learning</div>           
                <div class="curriculum-text p-2">Access our courses from anywhere through interactive online sessions, complete with live demonstrations, digital resources, and group discussions
                </div>
              </div>
            </div>
            
            <div class="curriculum-box">
              <div class="curriculum-item rounded-3 mx-auto">
                <div class="curriculum-icon rounded-3"> <img src="<?=ROOT?>/assets/media/images/field-experience.png" alt="" class="img-fluid"></div>
                <div class="curriculum-header rounded-top p-2">Field Experience</div>           
                <div class="curriculum-text p-2">Gain practical experience through field visits and real-world projects, where you’ll apply your skills in authentic work environments.</div>
              </div>
            </div>
            
            <div class="curriculum-box">
              <div class="curriculum-item rounded-3 mx-auto">
                <div class="curriculum-icon rounded-3"> <img src="<?=ROOT?>/assets/media/images/hands-on.png" alt="" class="img-fluid"></div>
                <div class="curriculum-header rounded-top p-2">Hands-On Projects</div>           
                <div class="curriculum-text p-2">Every course includes projects that reinforce practical skills, from setting up solar panels to configuring home automation systems.</div>
              </div>
            </div>
          </div>
        </section>
        
        <section class="container">
          <h2 class="text-center sub-header mb-1">Why Yunivolt Academy</h2>
          <div class="header-underline mx-auto mt-0 mb-3"></div>
          <div class="row row-cols-lg-3 mt-3 g-4 features row-cols-1 row-cols-md-2">
            <div class="col">
              <div class="feature-box rounded p-3 h-100">
                <div class="h5 d-flex align-items-center"> <img src="<?=ROOT?>/assets/media/images/feature-1.png" alt="" class="img-fluid" width="60"><span class="ms-2"> Expert-Led Training </span></div>
                <p>Learn from industry professionals with years of experience in solar, automation, and security solutions.</p>  
              </div>  
            </div>

            <div class="col">
              <div class="feature-box rounded p-3 h-100">
                <div class="h5 d-flex align-items-center"><img src="<?=ROOT?>/assets/media/images/feature-2.png" alt="" class="img-fluid" width="60"><span class="ms-2"> Hands-On Learning</span></div>
                <p>Get practical experience through projects and fieldwork, ensuring you leave with real-world skills.</p>   
              </div>
            </div>

            <div class="col">
              <div class="feature-box rounded p-3 h-100">
                <div class="h5 d-flex align-items-center"><img src="<?=ROOT?>/assets/media/images/feature-3.png" alt="" class="img-fluid" width="60"> <span class="ms-2">Flexible Learning Options</span></div>
                <p>Choose from in-person, online, and hybrid courses to suit your schedule and learning style.</p>   
              </div> 
            </div>

            <div class="col">
              <div class="feature-box rounded p-3 h-100">
                <div class="h5 d-flex align-items-center"><img src="<?=ROOT?>/assets/media/images/feature-4-alt.png" alt="" class="img-fluid" width="60"><span class="ms-2"> Cutting-Edge Facilities</span></div>
                <p>Train with the latest technology and equipment, giving you a head start in the industry.</p>    
              </div>
            </div>

            <div class="col">
              <div class="feature-box rounded p-3 h-100">
                <div class="h5 d-flex align-items-center"><img src="<?=ROOT?>/assets/media/images/feature-5.png" alt="" class="img-fluid" width="60"> <span class="ms-2"> Career-Ready Certifications</span> </div>
                <p>Earn recognized certifications that open doors to job opportunities and career advancement.</p>   
              </div> 
            </div>

            <div class="col">
              <div class="feature-box rounded p-3 h-100">
                <div class="h5 d-flex align-items-center"><img src="<?=ROOT?>/assets/media/images/feature-6-alt.png" alt="" class="img-fluid" width="60"><span class="ms-2"> Comprehensive Support</span></div>
                <p>Benefit from mentorship, personalized guidance, and a network of alumni and industry contacts.</p>    
              </div>
            </div>
            
          </div>
          
        </section>
        
        <!-- <section class="testimonies my-5">
          <h2 class="text-center sub-header mb-1">Testimonies</h2>
          <div class="header-underline mx-auto mt-0 mb-3"></div>
          
          <div class="testimony-container container">
            <div class="row justify-content-around row-cols-1 row-cols-md-3 gy-3">
              <div class="col">
                <div class="testimony-box border">
                  <div class="testimony-img">
                    <img class=" rounded-circle" src="<?=ROOT?>/assets/media/testimonies/testifyer1.png" alt="">
                  </div>
                  <div class="testimony-detail">
                    <p class="testifyer">Fatima R.</p>
                    <p class="tesimony"><i class="bi bi-quote"></i> Yunivolt Academy gave me the hands-on skills I needed. The instructors were experts, and the practical projects made all the difference!<i class="bi bi-quote q-last"></i></p>
                  </div>
                </div>
              </div>
              
              <div class="col">
                <div class="testimony-box border">
                  <div class="testimony-img">
                    <img class=" rounded-circle" src="<?=ROOT?>/assets/media/testimonies/testifyer2.jpg" alt="">
                  </div>
                  <div class="testimony-detail">
                    <p class="testifyer">James T.</p>
                    <p class="tesimony"><i class="bi bi-quote"></i> I joined Yunivolt to upskill in solar installation, and it’s the best decision I’ve made. Their focus on sustainability and cutting-edge tech is inspiring!.<i class="bi bi-quote q-last"></i></p>
                  </div>
                </div>
              </div>
              
              <div class="col">
                <div class="testimony-box border">
                  <div class="testimony-img">
                    <img class=" rounded-circle" src="<?=ROOT?>/assets/media/testimonies/testifyer3.jpg" alt="">
                  </div>
                  <div class="testimony-detail">
                    <p class="testifyer">Jenifer M.</p>
                    <p class="tesimony"><i class="bi bi-quote"></i> The flexibility of online and in-person classes allowed me to learn on my own time. Yunivolt’s courses are perfect for anyone balancing work and studies. <i class="bi bi-quote q-last"></i></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section> -->

        <section class="testimonies my-5">
          <h2 class="text-center sub-header mb-1">Testimonies</h2>
          <div class="header-underline mx-auto mt-0 mb-3"></div>
          
          <!-- Grid Layout for Large Screens -->
          <div class="testimony-container container d-none d-lg-block">
            <div class="row justify-content-around row-cols-1 row-cols-md-3 gy-3">
              <div class="col">
                <div class="testimony-box border">
                  <div class="testimony-img">
                    <img class="rounded-circle" src="<?=ROOT?>/assets/media/testimonies/testifyer1.png" alt="">
                  </div>
                  <div class="testimony-detail">
                    <p class="testifyer">Fatima R.</p>
                    <p class="tesimony"><i class="bi bi-quote"></i> Yunivolt Academy gave me the hands-on skills I needed. The instructors were experts, and the practical projects made all the difference!<i class="bi bi-quote q-last"></i></p>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="testimony-box border">
                  <div class="testimony-img">
                    <img class=" rounded-circle" src="<?=ROOT?>/assets/media/testimonies/testifyer2.jpg" alt="">
                  </div>
                  <div class="testimony-detail">
                    <p class="testifyer">James T.</p>
                    <p class="tesimony"><i class="bi bi-quote"></i> I joined Yunivolt to upskill in solar installation, and it’s the best decision I’ve made. Their focus on sustainability and cutting-edge tech is inspiring!.<i class="bi bi-quote q-last"></i></p>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="testimony-box border">
                  <div class="testimony-img">
                    <img class=" rounded-circle" src="<?=ROOT?>/assets/media/testimonies/testifyer3.jpg" alt="">
                  </div>
                  <div class="testimony-detail">
                    <p class="testifyer">Jenifer M.</p>
                    <p class="tesimony"><i class="bi bi-quote"></i> The flexibility of online and in-person classes allowed me to learn on my own time. Yunivolt’s courses are perfect for anyone balancing work and studies. <i class="bi bi-quote q-last"></i></p>
                  </div>
                </div>
              </div>

            </div>
          </div>
          
          <!-- Carousel Layout for Small Screens -->
          <div id="testimonialCarousel" class="carousel slide d-lg-none container" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="testimony-box border mx-auto">
                  <div class="testimony-img">
                    <img class="rounded-circle" src="<?=ROOT?>/assets/media/testimonies/testifyer1.png" alt="">
                  </div>
                  <div class="testimony-detail">
                    <p class="testifyer">Fatima R.</p>
                    <p class="tesimony"><i class="bi bi-quote"></i> Yunivolt Academy gave me the hands-on skills I needed. The instructors were experts, and the practical projects made all the difference!<i class="bi bi-quote q-last"></i></p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="testimony-box border mx-auto">
                  <div class="testimony-img">
                    <img class="rounded-circle" src="<?=ROOT?>/assets/media/testimonies/testifyer2.jpg" alt="">
                  </div>
                  <div class="testimony-detail">
                    <p class="testifyer">James T.</p>
                    <p class="tesimony"><i class="bi bi-quote"></i> I joined Yunivolt to upskill in solar installation, and it’s the best decision I’ve made. Their focus on sustainability and cutting-edge tech is inspiring!<i class="bi bi-quote q-last"></i></p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="testimony-box border mx-auto">
                  <div class="testimony-img">
                    <img class="rounded-circle" src="<?=ROOT?>/assets/media/testimonies/testifyer3.jpg" alt="">
                  </div>
                  <div class="testimony-detail">
                    <p class="testifyer">Jenifer M.</p>
                    <p class="tesimony"><i class="bi bi-quote"></i> The flexibility of online and in-person classes allowed me to learn on my own time. Yunivolt’s courses are perfect for anyone balancing work and studies.<i class="bi bi-quote q-last"></i></p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Custom controls with Bootstrap icons -->
            <button class="carousel-control-prev shadow-icon" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
              <i class="bi bi-arrow-left-circle fs-3"></i>
            </button>
            <button class="carousel-control-next shadow-icon" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
              <i class="bi bi-arrow-right-circle fs-3"></i>
            </button>
          </div>
        </section>

    </main>


    <?php $this->view('includes/footer') ?>
   
</body>
</html>


<!-- End #main --> 



 
     