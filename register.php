<?php
ob_start();
$register = 'selected';
$siteTitle = "Register ";
include'inc/header.php';
include'inc/functions.php';
redirectisuserlogin();

if (isset($_POST["submit"])) {
   $u = filter_input(INPUT_POST, 'username');
   $p = filter_input(INPUT_POST, 'password');
   $n = filter_input(INPUT_POST, 'name');
   $sn = filter_input(INPUT_POST, 'surname');

   include_once 'inc/connection.php';

   $q = 'insert into user(username,password,name,surname) values(?,?,?,?)';
   $st = mysqli_stmt_init($db);
   mysqli_stmt_prepare($st, $q) or exit('Query error');
   $p = password_hash($p, PASSWORD_DEFAULT);
   mysqli_stmt_bind_param($st, 'ssss', $u, $p, $n, $sn) or exit('Binding error');
   mysqli_stmt_execute($st); // omitted or exit('Query execution failed');

   if (mysqli_affected_rows($db) > 0) {
      header('Location: index.php');
      exit;
   } else {
      header('Location: viewrecipe.php');
      exit;
   }

   mysqli_close($cnn);
} // $_POST
?>
<div style="padding-bottom: 200px;"class="loginreg" id="login">
   <div class="container"><div class="text-center" style="margin-top: 80px"><img src="image/logo.PNG"alt="Responsive image" width="300" height="250" class="img-fluid"></div>
      <div id="login-row" class="row justify-content-center align-items-center">
         <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12 slide-in-top">

               <form id="login-form" class="form" action="" method="post">
                  <h3 class="text-center"><strong>Register</strong></h3>
                  <div class="form-group">
                     <label for="username">Username:</label><br>
                     <input required type="text" name="username" id="username" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="password">Password:</label><br>
                     <input required type="password" name="password" id="password" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="username">Name:</label><br>
                     <input  required type="text" name="name" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="username">Surname:</label><br>
                     <input required type="text" name="surname" id="surname" class="form-control">
                  </div>
                  <div class="form-group">
                     <label class="text-info"><span>After Submit You should Login with your new account.</span>
                      </label><br>
                      
                     <input type="submit" name="submit" class="btn btn-info btn-block" value="Submit">
                  </div>
                  <div id="register-link" class="text-right text-black-50">
                     <a href="login.php" class="text-info">Already have account? <br>Click here.</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
require 'inc/footer.php';
