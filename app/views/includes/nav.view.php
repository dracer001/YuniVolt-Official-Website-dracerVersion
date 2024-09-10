<header class="shadow header-nav">    
      <nav class="px-lg-5 py-lg-3 px-4 py-2">
        <div class="d-flex align-items-center justify-content-between">
         <div class="d-flex align-items-center justify-content-between">
           
        <div class="nav-btn d-flex flex-column me-4 d-md-none">
          <div class="nav-btn-item"></div>
          <div class="nav-btn-item"></div>
          <div class="nav-btn-item"></div>
        </div>
        
        <div class="">
          <a class="navbar-brand d-flex align-items-center" href="<?=ROOT?>/">
          <img src="<?=ROOT?>/assets/media/icons/logo.png" alt="Logo" class="d-inline-block align-text-top company-logo">
            <div class="company-title d-flex flex-column align-items-center justify-content-center">
              <span class="company-name">Yunivolt</span>
              <span class="company-slogan">(Power & Security)</span>
            </div>
          </a>
        </div>
        </div>
        
        <div class="d-flex justify-content-end align-items-center">

          
          <div class="nav-content-container d-none d-md-flex align-items-center">
            
             <div class="align-items-center justify-content-between p-3 offcanvas-header">
               <div class="d-flex align-items-center">
                 <img src="<?=ROOT?>/assets/media/icons/logo.png" alt="Logo" width="40" height="34" class="d-inline-block align-text-top">
              <span class="company-name">Yunivolt</span>
               </div>
               <div>
                 <i class="bi bi-x-lg close-nav"></i>
               </div>
               
             </div>
              
            <ul class="d-flex nav-content align-items-center">
              <li><a href="<?=ROOT?>/">Home</a></li>
              <li><a href="<?=ROOT?>/?url=about">About Us</a></li>
              <li><a href="<?=ROOT?>/?url=service"> Products & Services</a></li>
              <li><a href="<?=ROOT?>/?url=academy">Academy</a></li>
              <li><a href="<?=ROOT?>#contacts">Solar Calc</a></li>
              <li><a href="<?=ROOT?>#contacts">Contacts</a></li>
            </ul>
            <div class="auth-btns d-none px-3">
              <a href="" class="btn btn-c-primary w-100 mb-2"><i class="bi bi-person-fill-add"></i> Register</a>
              <a href="" class="btn btn-c-outline-primary w-100"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </div>
            
          </div>

          <?php if(Auth::signed_in()):?>

            <!-- display user photo with logout , profile option -->
          
          <?php else : ?>
            <div class="d-flex align-items-center justify-content-end ms-5 user-action">
              <button type="button" class="" data-bs-toggle="modal" data-bs-target="#sign-up-modal" >
                <i class="bi bi-person-fill-add"></i>
              </button>
              <button type="button" class="" data-bs-toggle="modal" data-bs-target="#sign-in-modal" >
                <i class="bi bi-box-arrow-in-right"></i>
              </button>

              <!-- INCASE I DECIDE TO HAVE A PAGE FOR SIGN UP AND SIGN IN -->
              <!-- <a href="">
                <i class="bi bi-person-fill-add"></i>
              </a> -->

              <!-- <a href="">
                <i class="bi bi-box-arrow-in-right"></i>
              </a> -->
            </div>
          <?php endif;?> 
        </div>
        </div>
      </nav>
    </header>