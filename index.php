
<?php
$index = 'selected';
$siteTitle = "Welcome to Recipe world !";
include 'inc/header.php';

?>

<body class=" indexbody">

<section > 
   <div class="container"  data-aos="fade-up" data-aos-duration="2000" data-aos-once="true"><div style="padding-bottom: 100px; class="row">
      </div>
      <div  style="background: #ffffff;border-width: 10px;border-color: var(--red);border-radius: 40px;">
         <div class="form-group">
            <div class="col" style="text-align: center; padding-bottom: 100px; padding-top: 102px;">
               <h2 style="color: rgb(118,75,196);font-size: 55px;transform: scale(1.01);border-bottom-style: none;text-shadow: 1px 0px 1px var(--white), 0px 1px 2px var(--dark), -1px 0px 2px var(--light), 0px -1px 2px var(--light), 0px 0px 3px var(--light);">


                  <?php
                  if (isset($_SESSION['userlogin']) && ($_SESSION['userlogin'] === 'OK')) {                      
                     $name =  $_SESSION['userdata']['name'];
                  } else {
                     $name = "";
                  }
                  echo 'Hello  ' . $name
                     . '   <em style="padding-top:10px;" class="fa fa-smile" '
                     . 'style="font-size: 35px;">'
                     . '</em></h2></br></br>';
                  ?>



                  <h2 style="color: rgb(118,75,196);font-size: 55px;transform: scale(1.01);border-bottom-style: none;text-shadow: 1px 0px 1px var(--white), 0px 1px 2px var(--dark), -1px 0px 2px var(--light), 0px -1px 2px var(--light), 0px 0px 3px var(--light);">
                     </em> WELCOME TO RECIPE WORLD! 
                  </h2>

            </div>



         </div> 
         </section>
         <div class="fixed-bottom">
<?php require 'inc/footer.php'; ?>

         </div>


         </body>


