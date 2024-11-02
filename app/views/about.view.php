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
        <section class="my-5 my-lg-5 container" id="about-us">
            <div class="row align-items-center">
            
                <div class="col-12 col-lg-8">
                <h2 class="text-center sub-header mb-1"> Who we are.</h2>
                <div class="header-underline mx-auto mt-0 mb-3"></div>
                <p class="px-2 text-center about-content">
                At Yunivolt, we specialize in integrating advanced energy, security, and automation solutions to enhance modern living. With expertise in solar installations, electrical systems, CCTV surveillance, and smart home technology, we are committed to delivering reliable, innovative, and tailored services that meet the unique needs of our clients. Our mission is to provide not just power and security, but peace of mind through seamless and sustainable solutions. Whether you’re looking to upgrade your home’s energy efficiency, enhance security, or simplify your life with automation, Yunivolt is your trusted partner.
                </p>
                </div>
                <div class="col-12 col-lg-4">
                <img class="img-fluid rounded-3 " src="<?=ROOT?>/assets/media/images/engineering.jpg" alt="emplyee images">
                </div>
            </div>
        </section>
        
        <section class="container">
          <div class="row row-cols-1 row-cols-md-2 gy-4">
            <div class="col">
              <div class="card statement mb-3 h-100">
                <div class="card-header">Mission</div>
                <div class="card-body">
                  <p class="card-text">At Yunivolt, our mission is to empower homes and businesses with innovative energy, security, and automation solutions. We are committed to delivering sustainable power and advanced technologies that enhance convenience, safety, and efficiency in everyday life.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card statement mb-3 h-100">
                <div class="card-header">Vision</div>
                <div class="card-body">
                  <p class="card-text">To be a leader in providing smart, integrated solutions that transform how people experience energy and security, creating a future where technology and sustainability empower communities worldwide.</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        

      <section class="gallary my-5 container">
        <h2 class="text-center sub-header mb-1"> Our Presence </h2>
        <div class="header-underline mx-auto mt-0 mb-2"></div>
        <!-- Container for the image gallery -->
        <div class="gallary-container pb-2">
          <?php if(is_array($gallaries)): ?>
            <?php foreach ($gallaries as $name => $gallary): ?>
              <div id="<?=$name?>" class="slide-container position-relative d-none" >
                <?php for ($i=0; $i < count($gallary) ; $i++): ?>
                  
                  <div class="mySlides">
                    <div class="numbertext"><?=$i+1?> / <?=count($gallary)?></div>
                    <img class="" src="<?=ROOT?>/assets/media/uploads/gallary/<?=$gallary[$i]['filename']?>">
                  </div>
                <?php endfor; ?>
                <!-- Next and previous buttons -->
                <a class="move-slide prev" data-collection="<?=$name?>">&#10094;</a>
                <a class="move-slide next" data-collection="<?=$name?>">&#10095;</a>


              <!-- caption -->
                <div class="caption-container py-2">
                  <span id="caption"><?=$name?></span>
                </div>
              </div>
 
            <?php endforeach; ?>

            <!-- Thumbnail images -->
            <div class="d-flex g-collection-container p-2">
              <?php foreach($gallaries as $name => $gallary) :?>
                <div class="g-collection">
                  <img class="demo cursor img-thumbnail collection-img" src="<?=ROOT?>/assets/media/uploads/gallary/<?=$gallary[0]['filename']?>" data-collection="<?=$name?>" alt="The Woods">
                </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <div> Gallary Not Available </div>
          <?php endif; ?>
        </div>
    </section>
  </main>

  <?php $this->view('includes/footer') ?>
   
</body>
</html>


<!-- End #main --> 
 
     