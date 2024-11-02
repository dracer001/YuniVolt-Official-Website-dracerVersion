<div id="notify"></div>
<header class="shadow">    
      <nav class="px-lg-5 py-2 px-4">
        <div class="d-flex align-items-center justify-content-between">
         <div class="d-flex align-items-center justify-content-between">
           
        <div class="nav-btn d-flex flex-column me-4 d-lg-none">
          <div class="nav-btn-item"></div>
          <div class="nav-btn-item"></div>
          <div class="nav-btn-item"></div>
        </div>
        
        <div class="">
          <a class="navbar-brand d-flex align-items-center" href="<?=ROOT?>/">
          <img src="<?=ROOT?>/assets/media/icons/logo.png" alt="Logo" class="d-inline-block align-text-top company-logo">
            <div class="company-title d-flex flex-column align-items-center justify-content-center">
              <span class="company-name">Yunivolt</span>
              <span class="company-slogan">(Power & Digital Security)</span>
            </div>
          </a>
        </div>
        </div>
        
        <div class="d-flex justify-content-end align-items-center">
          <div class="nav-content-container d-none d-lg-flex align-items-center">
      
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
              <li><a href="<?=ROOT?>/?url=services"> Products & Services</a></li>
              <li><a href="<?=ROOT?>/?url=academy">Academy</a></li>
              <li><a href="<?=ROOT?>#solar-calc">Solar Calc</a></li>
              <li><a href="<?=ROOT?>#contacts">Contacts</a></li>
            </ul>

            <?php if(Auth::signed_in()):?>
              <div class="auth-btns d-none px-3">
                <a href="" class="btn btn-main w-100 mb-2"><i class="bi bi-person-fill-add"></i> Profile</a>
                <a href="<?=ROOT?>/?url=signout" class="btn btn-outline-main w-100"><i class="bi bi-box-arrow-in-right"></i> Logout</a>
              </div>   
              <!-- button for large screen -->
              <div class="d-lg-flex align-items-center justify-content-end ms-5 user-action profile-link d-none">
                <button type="button" class="" >
                  <i class="bi bi-person-circle"></i>
                </button>
                <a href="<?=ROOT?>/?url=signout" class="btn" id="sign-out">
                  <i class="bi bi-box-arrow-left"></i>
                </a>
              </div>
            <?php else: ?>
              <div class="auth-btns d-none px-3">
                <button type="button" class="btn btn-main w-100 mb-2" data-bs-toggle="modal" data-bs-target="#sign-up-modal">
                  <i class="bi bi-person-fill-add"></i> Register
                </button>
                <button type="button" class="btn btn-outline-main w-100" data-bs-toggle="modal" data-bs-target="#sign-in-modal">
                  <i class="bi bi-box-arrow-in-right"></i> Login
                </button>
              </div>   

              <!-- Button for Large screen -->
              <div class="d-lg-flex align-items-center justify-content-end ms-5 user-action">
                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#sign-up-modal" >
                  <i class="bi bi-person-fill-add"></i>
                </button>
                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#sign-in-modal" >
                  <i class="bi bi-box-arrow-in-right"></i>
                </button>
              </div>
              <?php endif; ?>
          </div>
        </div>
        </div>
      </nav>
</header>


    <!-- Modal -->
<input type="hidden" id="root-url" value="<?=ROOT?>">

<?php if(!Auth::signed_in()):?>
  <div class="modal fade" id="sign-up-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Create an account with us</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="border rounded-3 p-4 shadow" id="sign-up-form">
            <div class="server-msg"></div>

            <div class="form-group mb-3">
                <label for="reg-name">Name</label>
                <input type="text" id="reg-name" class="form-control" name="name" placeholder="lastname firstname" require>
                <div class="invalid-feedback">Error message here</div>
            </div>

            <div class="form-group mb-3">
                <label for="reg-email">Email</label>
                <input type="email" id="reg-email" class="form-control" name="email" placeholder="example@email.com" require>
                <div class="invalid-feedback">Error message here</div>
            </div>

            <div class="form-group mb-3">
                <label for="reg-password">Password</label>
                <input type="password" id="reg-password" class="form-control" name="password" require>
                <div class="invalid-feedback">Error message here</div>
            </div>

            <div class="form-group mb-3">
                <label for="c-password">Confirm Password</label>
                <input type="password" id="c-password" class="form-control" name="confirm_password" require>
                <div class="invalid-feedback">Error message here</div>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Sign Up</button> -->


            <div class="loading-form d-none position-absolute top-50 start-50 translate-middle">
              <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>

            <button type="submit" class="btn-main reg-btn">Register</button>
            
          <div class="mt-4">
            <div id="g_id_onload"
                data-client_id="856091974883-ras3bsdnkqu91gfp55846ovmpop7jnrk.apps.googleusercontent.com"
                data-context="signup"
                data-ux_mode="popup"
                data-callback="handleGoogleAuth"
                data-nonce=""
                data-auto_select="false"
                data-itp_support="true">
            </div>

            <div class="g_id_signin"
                data-type="standard"
                data-shape="pill"
                data-theme="outline"
                data-text="signup_with"
                data-size="medium"
                data-logo_alignment="left">
            </div>
          </div>


          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="sign-in-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Login your account</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="border rounded-3 p-3 shadow" id="sign-in-form">
            <div class="server-msg"></div>

            <div class="form-group mb-3">
                <label for="log-email">Email</label>
                <input type="email" id="log-email" class="form-control" name="email">
                <div class="invalid-feedback">Error message here</div>
            </div>

            <div class="form-group mb-3">
                <label for="log-password">Password</label>
                <input type="password" id="log-password" class="form-control" name="password">
                <div class="invalid-feedback">Error message here</div>
            </div>


            <div class="loading-form d-none position-absolute top-50 start-50 translate-middle">
              <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>

            <button type="submit" class="btn-main reg-btn">Login</button>

            <div class="mt-4">
              <div id="g_id_onload"
                  data-client_id="856091974883-ras3bsdnkqu91gfp55846ovmpop7jnrk.apps.googleusercontent.com"
                  data-context="signin"
                  data-ux_mode="popup"
                  data-callback="handleGoogleAuth"
                  data-nonce=""
                  data-auto_select="false"
                  data-itp_support="true">
              </div>

              <div class="g_id_signin"
                  data-type="standard"
                  data-shape="pill"
                  data-theme="outline"
                  data-text="signin_with"
                  data-size="medium"
                  data-logo_alignment="left">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php else: ?>
  
  <div id="user-data">
    <?php $user = $_SESSION["USER_DATA"]; ?>
    <data id="user-email" value="<?=$user->email?>"></data>
    <data id="user-firstname" value="<?=$user->firstname?>"></data>
    <data id="user-lastname" value="<?=$user->lastname?>"></data>
  </div>

<?php endif;?> 