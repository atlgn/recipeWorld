<?php
ob_start();
$login = 'selected';
$siteTitle = "Login";
require'inc/connection.php';
include'inc/header.php';
include'inc/functions.php';

//kullanıcı login durumdaysa
redirectisuserlogin();

if (isset($_POST['submit'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   $q = 'select password from user where username=?';
   $st = mysqli_stmt_init($db);
   mysqli_stmt_prepare($st, $q) or exit('Query error');
   mysqli_stmt_bind_param($st, 's', $username) or exit('Binding error');
   mysqli_stmt_execute($st) or exit('Query execution failed');
   mysqli_stmt_bind_result($st, $pwd) or exit('Result storage fail');

   if (mysqli_stmt_fetch($st)) {
      if (password_verify($password, $pwd)) {


         mysqli_stmt_free_result($st);
         mysqli_stmt_close($st);

         $row = getuser($db, $username); //GET USER DATA

         session_start();
         $_SESSION['userlogin'] = "OK";
         $_SESSION['userdata'] = $row;
         $_SESSION['isadmin'] = $row['is_admin'];

         header('location:index.php');
      } else { // wrong password
         echo "password is wrong<br/>";
      }
   } else { // wrong username
      echo "Username is wrong<br/>";
   }

   //mysqli_stmt_free_result($st);
   //mysqli_stmt_close($st);
   mysqli_close($db);
}
?>



<div  style="padding-bottom: 200px;" id="login">
   <div class="container"><div class="text-center" style="margin-top: 80px"><img src="image/logo.PNG"alt="Responsive image" width="300" height="250" class="img-fluid"></div>
      <div id="login-row" class="row justify-content-center align-items-center">
         <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12 slide-in-top">
               <form id="login-form" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <h3 class="text-center"><strong>Login</strong></h3>
                  <div class="form-group">
                     <label for="username">Username:  (test admin : admin)</label><br>
                     <input required type="text" name="username" id="username" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="password">Password:  (test admin : admin)</label><br>
                     <input required type="password" name="password" id="password" class="form-control">
                  </div>
                  <div class="form-group">
                <br>
                     <input required type="submit" name="submit" class="btn btn-info btn-block" value="Submit">
                  </div>
                  <div id="register-link" class="text-right text-black-50">
                     <a href="register.php" class="text-info">Register here</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</body>
<?php
require 'inc/footer.php';
