<?php $this->view('includes/header',$data) ?>
 
</head> 
<body style="height: 100vh;"> 
<?php $this->view('includes/nav',$data) ?>

<div id="main-wrapper">

<sidenav> 
  <nav id="navMenu-Desktop">
    <ul id="navLinkWrapper-Desktop" class="pd-left20px pd-right10px mg-top10px"> 
      <div class="br10 pd-tb5px pd-left10px mg-bottom10px">
        <li onclick="tabController('dashboard')" class="navLink">Dashboard</li> 
      </div>

      <div class="br10 pd-tb5px pd-left10px mg-bottom10px">
        <li onclick="openNavChild('navchild-DT1')" class="navLink">FX Journal</li>
        <div id="navchild-DT1" class="js-navChildTabs ds-none">
          <li onclick="tabController('journeyJournal')" class="childNavLink">Create Journal</li> 
          <li onclick="tabController('performMatrics')" class="childNavLink">Performance Metrics</li> 
        </div> 
      </div> 
      
      <?php if(Auth::is_admin()):?>
      <div class="br10 pd-tb5px pd-left10px mg-bottom10px">
        <li onclick="tabController('manageUsers')" class="navLink">Manage Users</li> 
      </div>   
      <?php endif;?>
      
      <div class="br10 pd-tb5px pd-left10px mg-bottom10px">
        <li onclick="tabController('profile')" class="navLink">Profile</li> 
      </div>

      <div class="br10 pd-tb5px pd-left10px mg-bottom10px">
        <li class="navLink"><a href="<?=ROOT?>/logout">Logout</a></li> 
      </div>
    </ul>
  </nav> 
</sidenav> 

<main id="userAccount" class="userAccount">  
    <section id="dashboard" class="ds-none js-sec-tabs">

      <!--____Message Notifier | Property________-->
      <div class="mg-lr10px">
        <!--All Success Messages Displayer-->
        <?php if(message()):?> 
          <div class="msg-success"><?=message('',true)?></div>
        <?php endif;?> 

        <!--All Error Messages Displayer-->
        <?php if(!empty($errMsg)):?> 
          <div class="msg-warning"><?=$errMsg?></div>
        <?php endif;?>
      </div>

      <!--____Public Journal | Property____-->
      <div class="defaultSecBox">
      <div class="ds-flex">
        <div class="wd80pc">
          <h1 class="bottom10px">Public Journals</h1>
          <p id="publicJournalsWarn" class="ds-none">You have closed viewing the public Journal, kindly click "open" to continue viewing.</p> 
        </div>
        <div class="wd20pc">
          <p id="openWid" onclick="publicJournalController()" class="ds-none txtAli-right">OPEN &#11022;</p> 
          <p id="closeWid" onclick="publicJournalController()" class="ds-block txtAli-right">CLOSE &#11025;</p>
        </div>
      </div> 
      <div id="publicJournalsWrapper">
      <?php if(mysqli_num_rows($journalPublicViewer) > 0):?> 
          <div class="mg-top10px mg-bottom10px" style="overflow-x: auto; max-height:300px">
            <table class="journalTable"> 
             <thead>
               <tr>
                <th class="tableHead">No.</th> 
                <th class="tableHead">TimeFrame</th>  
                <th class="tableHead">Strategy</th> 
                <th class="tableHead">Type Of Order</th>  
                <th class="tableHead">Pair</th>  
                <th class="tableHead">Volume</th>  
                <th class="tableHead">Stop Loss</th>  
                <th class="tableHead">Take Profit</th>  
                <th class="tableHead">Entry Price</th>  
                <th class="tableHead">Profit/Loss</th>  
                <th class="tableHead">R:R R</th>  
                <th class="tableHead">WIN/LOSE</th>
                <th class="tableHead">INITIAL BALANCE</th>
                <th class="tableHead">CURRENT BALANCE</th>
                <th class="tableHead">G/L%</th>  
                <th class="tableHead">COMMENT-ON-TRADE</th>  
                <th class="tableHead">DATE</th>     
              </tr>
            </thead>
            <?php while($row = mysqli_fetch_assoc($journalPublicViewer)):?>
            <tbody>
               <tr>
                <td class="pd-sqr10px"><?=$row['id']?></td>
                <td class="pd-sqr10px"><?=$row['timeframe']?></td> 
                <td class="pd-sqr10px"><?=$row['strategy']?></td> 
                <td class="pd-sqr10px"><?=$row['typeoforder']?></td>   
                <td class="pd-sqr10px"><?=$row['pair']?></td>   
                <td class="pd-sqr10px"><?=$row['volume']?></td>   
                <td class="pd-sqr10px"><?=$row['stoploss']?></td>   
                <td class="pd-sqr10px"><?=$row['takeprofit']?></td>   
                <td class="pd-sqr10px"><?=$row['entryprice']?></td>   
                <td class="pd-sqr10px"><?=$row['profit_loss']?></td>   
                <td class="pd-sqr10px"><?=$row['r_r_r']?></td>   
                <td class="pd-sqr10px"><?=$row['win_lose']?></td>   
                <td class="pd-sqr10px"><?=$row['initial_balance']?></td>
                <td class="pd-sqr10px"><?=$row['current_balance']?></td>
                <td class="pd-sqr10px"><?=$row['growth_lose']?></td>   
                <td class="pd-sqr10px"><?=$row['comment']?></td>   
                <td class="pd-sqr10px"><?=$row['date']?></td>     
               </tr>  
            </tbody>
            <?php endwhile;?> 
          </table>
          </div>  
      <?php else:?> 
        <div class="txtAli-center">
          <p class="pd-bottom31px">Oops! No record found.
             Please check back later or request a friend to share their Trading Journals. Thank you!</p>
        </div>
      <?php endif;?>
      </div>
      </div>

    </section> 

    <?php if(Auth::is_admin()):?>
    <section id="manageUsers" class="defaultSecBox ds-none js-sec-tabs">
     <div style="padding:10px 20px">
      <h2><?=$manageUserHeader?></h2>
     <?php if($activeTab == "manageUsers"):?>  
      <div class="mg-top31px mg-bottom41px">
        <form method="POST">
          <select class="brand-cl-realGray ft-size15px ff-body pd-sqr5px br5 mg-right10px"  name="role">
            <option disabled>Select Action</option>
            <option value="admin">Promote To Admin</option>
            <option value="user">Demote To User</option>
          </select><br><br>
          <input type="text" name="userID" value="<?=$specificUserID?>" hidden>
          <input type="text" name="sig" value="editUserDetails_action" hidden>
          <button>Update</button>
        </form>
      </div>  
     <?php else:?> 
      <div class="mg-top31px mg-bottom41px">
       <?php if(mysqli_num_rows($allUsersInfo) > 0):?>
       <div style="overflow-x: auto;">
        <table>
          <tr>
            <th class="tableHead">ID</th> 
            <th class="tableHead">Full Name</th>  
            <th class="tableHead">Email</th>  
            <th class="tableHead">Role</th> 
            <th class="tableHead">Action</th> 
          </tr>
         <?php while($row = mysqli_fetch_assoc($allUsersInfo)):?> 
          <tr>
            <td class="pd-sqr10px"><?=$row['id']?></td>
            <td class="pd-sqr10px"><?=$row['firstname']?> <?=$row['lastname']?></td>
            <td class="pd-sqr10px"><?=$row['email']?></td>
            <td class="pd-sqr10px"><?=$row['role']?></td>
            <form method="POST">
              <input type="text" name="userID" value="<?=$row['id']?>" hidden>
              <input type="text" name="sig" value="editUserDetails" hidden>
              <td class="pd-sqr5px"><button class="wd50px">Edit</button></td>
            </form>
          </tr>
         <?php endwhile;?> 
        </table>
        </div>
       <?php else:?> 
          <div class="txtAli-center">
            <p class="pd-bottom31px">Oops! No user fund in the database
            </p>
          </div>
       <?php endif;?> 
      </div>
      <?php endif;?> 
     </div>
    </section> 
    <?php endif;?>

    <section id="profile" class="js-sec-tabs ds-none defaultSecBox pd-sqr20px">  
        <div>
            <?php if(file_exists($userInfo['image'])):?> 
             <div class="txtAli-center"> 
                <img class="wd100px br10" src="<?=$userInfo['image']?>" alt="">
             </div>
            <?php else:?> 
             <div class="txtAli-center">
                <img class="wd100px br10" src="<?=ROOT?>/assets/images/dummyAvatar.png" alt="">
             </div>
            <?php endif;?> 
            <h2 class="txtAli-center pd-none pd-top10px"><?=$userInfo['firstname']?> <?=$userInfo['lastname']?></h2>
        </div>

        <hr class="mg-tb10px ht3px bd-zero brand-bg-realGray"> 

        <!-- _____Profile - Navigation________________ -->  
        <div>
            <div class="ds-flex">
                <p onclick="profileTabController('adminProfile-overview')" class="boldText cs-pointer pd-lr10px pd-bottom39px" ><button class="wd70px ft-size10px">Overview</button></p>     
                <p onclick="profileTabController('adminProfile-edit')" class="boldText cs-pointer pd-lr10px"><button  class="wd70px ft-size10px">Edit Profile</button></p>     
                <p onclick="profileTabController('adminProfile-changePass')" class="boldText cs-pointer pd-lr10px"><button class="wd70px ft-size10px">Password</button></p>        
            </div>
        </div> 

        <!-- _____Profile - overview________________ -->  
        <div id="adminProfile-overview" class="profileTab pd-top20px"> 
        <?php if(!empty($errors['image'])):?>
                   <small class="brand-cl-red msg-warning"><?= $errors['image'];?></small> <br> 
                <?php endif;?><br>
            <div>
               <h2>Bio</h2>
               <p> 
                 <?=$userInfo['bio']?>
               </p>
            </div>  
            <div class="pd-top20px">
               <h2  >Details</h2>
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Full name</p>
                   <p><?=$userInfo['firstname']?> <?=$userInfo['lastname']?></p>
               </div> 
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Position/Role</p>
                   <?php if($userInfo['role']=='user'):?> 
                     <p>Kit Operator</p>
                   <?php else:?> 
                     <p>Kit Operator</p>
                  <?php endif;?> 
               </div>
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Email</p>
                   <p><?=$userInfo['email']?> </p>
               </div>
            </div>      
        </div>

        <!-- _____Profile - Edit________________ -->  
        <div id="adminProfile-edit" class="profileTab ds-none pd-top20px">  
            <div class="pd-top20px">
             <form method="post" enctype="multipart/form-data"> 
                
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Update Profile Image</p>
                   <div> 
                        <div id="ssss" class="txtAli-left">
                          <img class="js-image-preview wd100px br10 ds-none" src=""  alt="" style="width:200px;max-width:200px;height:200px;object-fit: cover;"> 
                        </div>  
                       <div class="ds-flex">
                          <input onchange="load_image(this.files[0])" class="bd-zero" type="file" name="image"> 
                       </div>
                    </div>
               </div>
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Bio</p>
                   <textarea class="defaultInput" type="text" name="bio" ><?=$userInfo['bio']?></textarea>
               </div>    
               <input type="text" name="sig" value="edit-profile" hidden>
               <button>Update</button>
             </form> 
            </div>      
        </div>

        <!-- _____Profile - changePassword________________ -->  
        <div id="adminProfile-changePass" class="profileTab ds-none pd-top20px">  
            <div class="pd-top20px">
              <h2>Change Your Password</h2>
             <form >    
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Current Password</p>
                   <input class="defaultInput" type="text" name="tt">
               </div>
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">New Password</p>
                   <input class="defaultInput" type="text" name="tt">
               </div> 
               <div class="pd-bottom15px">
                   <p class="pd-bottom5px boldText brand-cl-skyblue">Confirm New Password</p>
                   <input class="defaultInput" type="text" name="t">
               </div> 
               <button>Proceed</button>
             </form> 
            </div>      
        </div>
    </section>
</main><!-- End #main -->   

<sidebar class="pd-sqr10px mg-left20px mg-right10px">
  <div id="featuredPost" class="mg-bottom21px">
    <h2>Featured Articles</h2>  

    <div class="mg-tb15px">
      <div class="txtAli-center pd-bottom10px">
        <img class="wd100pc ht100pc br10" src="<?=ROOT?>/assets/images/bg.jpg" alt="">
        <!--<img class="wd100pc ht100pc br10" src="<?=ROOT?>/<?=$row['featured_image']?>" alt="">-->
      </div>
      <div>
        <span class="blogSpan pd-tb5px pd-right5px ft-size14px">Sun Nov 20</span>
        <span class="blogSpan pd-sqr5px ft-size14px">Emmanuel Okonkwo</span>
        <span class="blogSpan pd-sqr5px ft-size14px">3 min read</span>
        <!--<span class="blogSpan pd-tb5px pd-right5px ft-size14px"><?=$row['date']?></span>
        <span class="blogSpan pd-sqr5px ft-size14px"><?=$row['author']?></span>
        <span class="blogSpan pd-sqr5px ft-size14px">3 min read</span>-->
      </div> 
      <div>
        <h2 class="blogH2 boldText">Create A Post Vital Today For Real Again Now</h2> 
        <article class="featuredBlogAcct breakArticle">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium numquam sint ullam sequi illo nemo reprehenderit assumenda, aliquam, voluptas iste id. Totam voluptatem repudiandae ducimus distinctio corporis aliquid asperiores vero.</article> 
        <!--<h2 class="blogH2 boldText"><a href="<?=ROOT?>/blog/<?=str_replace(" ", "-", $row['heading']);?>"><?=$row['heading']?></a></h2> 
        <article class="blogP breakArticle"><?=$row['post']?></article> -->
      </div>
    </div>   
   <hr>
       
  </div>

  <div id="latestPost">
    <h2>Latest Articles</h2> 

   <div class="ds-flex mg-top15px"> 
    <div class="wd35pc txtAli-center pd-right10px">
      <img class="wd100pc br10" src="<?=ROOT?>/assets/images/bg.jpg" alt=""> 
      <!--<img class="wd100pc br10" src="<?=ROOT?>/<?=$row['featured_image']?>" alt="">-->
    </div>
    <div class="wd65pc mg-bottom20px">
      <h2 class="pd-none ft-post-H2">Create A Post Vital Today For Real Again Now</h2>
      <p class="breakArticle ft-size13px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde deleniti rem veritatis? Eveniet fugit ex illo velit aliquid facere non laborum vitae harum eos magnam, quae ipsam cum consectetur iusto.</p>
      <!--<h2 class="pd-none ft-post-H2"><a href="<?=ROOT?>/blog/<?=str_replace(" ", "-", $row['heading']);?>"><?=$row['heading']?></a></h2>
      <p class="breakArticle ft-size13px"><?=$row['post']?></p>-->
    </div>          
   </div>
   <hr>

   <div class="ds-flex mg-top15px"> 
    <div class="wd35pc txtAli-center pd-right10px">
      <img class="wd100pc br10" src="<?=ROOT?>/assets/images/bg.jpg" alt=""> 
      <!--<img class="wd100pc br10" src="<?=ROOT?>/<?=$row['featured_image']?>" alt="">-->
    </div>
    <div class="wd65pc mg-bottom20px">
      <h2 class="pd-none ft-post-H2">Create A Post Vital Today For Real Again Now</h2>
      <p class="breakArticle ft-size13px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde deleniti rem veritatis? Eveniet fugit ex illo velit aliquid facere non laborum vitae harum eos magnam, quae ipsam cum consectetur iusto.</p>
      <!--<h2 class="pd-none ft-post-H2"><a href="<?=ROOT?>/blog/<?=str_replace(" ", "-", $row['heading']);?>"><?=$row['heading']?></a></h2>
      <p class="breakArticle ft-size13px"><?=$row['post']?></p>-->
    </div>          
   </div>
   <hr>

   <div class="ds-flex mg-top15px"> 
    <div class="wd35pc txtAli-center pd-right10px">
      <img class="wd100pc br10" src="<?=ROOT?>/assets/images/bg.jpg" alt=""> 
      <!--<img class="wd100pc br10" src="<?=ROOT?>/<?=$row['featured_image']?>" alt="">-->
    </div>
    <div class="wd65pc mg-bottom20px">
      <h2 class="pd-none ft-post-H2">Create A Post Vital Today For Real Again Now</h2>
      <p class="breakArticle ft-size13px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde deleniti rem veritatis? Eveniet fugit ex illo velit aliquid facere non laborum vitae harum eos magnam, quae ipsam cum consectetur iusto.</p>
      <!--<h2 class="pd-none ft-post-H2"><a href="<?=ROOT?>/blog/<?=str_replace(" ", "-", $row['heading']);?>"><?=$row['heading']?></a></h2>
      <p class="breakArticle ft-size13px"><?=$row['post']?></p>-->
    </div>          
   </div>
   <hr> 
  </div>
</sidebar>

</div>

<script>
  var active_tab = '<?= $activeTab?>';
  document.getElementById(active_tab).style.display = "block"; 
</script>

<?php $this->view('includes/footer') ?>