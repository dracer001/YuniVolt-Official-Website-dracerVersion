<?php $this->view('includes/header',$data) ?>
</head> 
<body style="height: 100vh;">

<main class="pd-left20px pd-right20px pd-bottom41px"> 
    <section id="unvailablePopUp" class="generalPopUp" style="display: block;"> 
      <div class="generalPopUp-child">
        <h1>Hey!</h1>
      <p>We are cooking something interesting... Pls check back later!
      </p> 
        <a href="http://localhost/success/yunivolt/public"><button>Okay</button></a>
      </div>
    </section>
 
    <section class="defaultSec mg-top41px" style="padding: 5% 5%;" > 
        <div class="txtAli-center"> 
            <a id="brand-logo" href="<?=ROOT?>">
            <img class="brandLogo" alt="logo" src="<?=ROOT?>/assets/images/brand/brand-logo.png" >
            </a> 
            <p style="text-align:center;" class="pd-sqr20px ft-size17px">We're delighted to see you return. Your loyalty means the world to us.</p>
        </div>
           
        <div class="mg-bottom20px">
            <form method="post">
                <h4 class="mg-bottom10px">Please enter your credentials to access your account.</h4>
                
                 
                 <?php if(message()):?> 
                   <div class="msg-success"><?=message('',true)?></div>
                <?php endif;?>
                 
                <?php if(!empty($errors['email'])):?>
                   <small class="brand-cl-red msg-warning"><?= $errors['email'];?></small> <br> 
                <?php endif;?><br>
                <span>Email</span><br>
                <input class="wd90pc ht40px" name="email" type="text"><br><br>
                <span>Password</span><br>
                <input id="password-input" class="wd90pc ht40px" type="password" name="password"><br>
                <input style="margin-top:5px;" type="checkbox" onclick="showPasword()"> <span>Show password</span><br><br>

                <button>Send</button>
            </form>
            <p class="pd-top10px">New to Yunivolt? <a href="<?=ROOT?>/signup">sign up</a> straight away!</p>    
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