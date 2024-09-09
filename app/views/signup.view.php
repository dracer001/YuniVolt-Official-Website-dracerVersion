<?php $this->view('includes/header',$data) ?>
</head> 
<body style="height: 100vh;">
<main class="pd-left20px pd-right20px pd-bottom41px"> 

    <section id="unvailablePopUp" class="generalPopUp" style="display: block;"> 
      <div class="generalPopUp-child">
        <h1>Hey!</h1>
      <p>This feature is currently unavailable, pls check back later!
      </p> 
        <a href="http://localhost/success/yunivolt/public"><button>Okay</button></a>
      </div>
    </section>
 
    <section class="defaultSec mg-top41px" style="padding: 5% 5%;" > 
        <div class="txtAli-center"> 
            <a id="brand-logo" href="<?=ROOT?>"> 
              <img class="brandLogo" alt="logo" src="<?=ROOT?>/assets/images/brand/brand-logo.png" >
            </a> 
            <p class="pd-sqr20px ft-size17px" style="text-align:center;">Unlock a world of possibilities by creating your account. Signing up is quick, easy, and your first step towards an enriched experience.</p>
        </div>
           
        <div class="mg-bottom20px">
            <form method="post">
                <h4 class="mg-bottom10px">Ready to get started? Sign up now!</h4> 
                <div class="ds-flex wd100pc">
                    <div class="wd40pc">
                      <label>First Name</label><br>
                      <input class="wd100pc ht40px" type="text" name="firstname">
                    </div>
                    <div class="wd10pc"></div>
                    <div class="wd40pc"> 
                      <label>Last Name</label><br> 
                      <input class="wd100pc ht40px" type="text" name="lastname">
                    </div>
                </div> <br> 
                <label>Phone Number</label><br>
                <input class="wd90pc ht40px " type="number" name="phone" ><br>  <br> 
                
                <label>Email Address</label><br>
                <input class="wd90pc ht40px" type="text" name="email"><br><br>  
 
                <label>Password</label><br>
                <input id="password-input" class="wd90pc ht40px" type="password" name="password"><br>
                <input style="margin-top:5px;" type="checkbox" onclick="showPasword()"> <span>Show password</span><br><br>
                <button class="wd90pc" type="submit">Send</button>
            </form>
            <p class="pd-top10px">Already a IBT Society member? <a href="<?=ROOT?>/login">login</a> straight away!</p>    
        </div>     
    </section> 
</main>

<script>
    function showPasword() {
  var pass = document.getElementById("password-input");
  if (pass.type === "password") {
    pass.type = "text";
  } else {
    pass.type = "password";
  }
}
</script>
</body> 
</html>