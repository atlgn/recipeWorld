<?php
session_start();
?>



<head>
   <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__ = "dreamweaver"</script><script src="http://use.edgefonts.net/chewy:n4:default;allura:n4:default;aguafina-script:n4:default;adamina:n4:default;aclonica:n4:default.js" type="text/javascript"></script>
<link href="../css/shop.css" rel="stylesheet">
   <link href="../css2/main.css" rel="stylesheet">
      <link href="../css/index.css" rel="stylesheet">
         <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
               <link rel="stylesheet" href="../fonts/font-awesome.min.css">
                  <link rel="stylesheet" href="../fonts/ionicons.min.css">
                     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
                           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
                              <link rel="stylesheet" href="../css/Social-Icons.css">
                                 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
                                    <title><?php echo $siteTitle; ?></title>
                                    </head>
                                    <body>
                                    <div  class="row fixed-top">
                                       <div class="col-md-12">
                                          <header>
                                             <nav style="margin-left: 50px; margin-right: 50px;"class=" navbar navbar-expand-lg nav">
                                                <div class="collapse navbar-collapse" id="navbarResponsive">
                                                   <li class="head-title"  >
                                                      <a class="nav-link"><?php echo $siteTitle; ?></a>
                                                   </li>
                                                   <ul class="navbar-nav ml-auto">
                                                      <li class="nav-item">
                                                         <a class="nav-link <?php
                                                         if (isset($index)) {
                                                            echo 'navactive" style="color: black"';
                                                         }
                                                         ?>" href="index.php">Home  
                                                         </a>
                                                      </li>
                                                      <li class="nav-item">
                                                         <a class="nav-link <?php
                                                         if (isset($category)) {
                                                            echo 'navactive" style="color: black"';
                                                         }
                                                         ?>" href="category.php">Category</a>
                                                      </li>
                                                      <li class="nav-item">
                                                         <a class="nav-link <?php
                                                         if (isset($about)) {
                                                            echo 'navactive" style="color: black"';
                                                         }
                                                         ?>" href="about.php">About</a>
                                                      </li>

                                                      <?php if (isset($_SESSION['userlogin']) && ($_SESSION['userlogin'] === 'OK')) { ?> 

                                                         <li class="nav-item">
                                                            <a class="nav-link <?php
                                                            if (isset($logout)) {
                                                               echo 'navactive" style="color: black"';
                                                            }
                                                            ?>" href="logout.php">Logout</a>
                                                         </li>
                                                         <li class="nav-item">
                                                            <a class="nav-link <?php
                                                            if (isset($add_recipe)) {
                                                               echo 'navactive" style="color: black"';
                                                            }
                                                            ?>" href="add.php">Add Recipe</a>
                                                         </li>

                                                      <?php } else { ?>

                                                         <li class="nav-item">
                                                            <a class="nav-link <?php
                                                            if (isset($register)) {
                                                               echo 'navactive" style="color: black"';
                                                            }
                                                            ?>" href="register.php">Register</a>
                                                         </li>
                                                         <li class="nav-item">
                                                            <a class="nav-link <?php
                                                               if (isset($login)) {
                                                                  echo 'navactive" style="color: black"';
                                                               }
                                                               ?>" href="login.php">Login</a>
                                                         </li>

                                                      <?php } ?>

                                                   </ul>
                                                </div>
                                             </nav>
                                          </header>
                                       </div>
                                    </div>



