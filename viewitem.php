<?php
$search = 'selected';
$siteTitle = "Search Now! ";
$recipeId = intval($_GET['id']);

include 'inc/header.php';
require_once 'inc/connection.php';
require 'inc/functions.php';

$recipeDetail = recipedetail($db, $recipeId);
?>

<!-- Page Content -->
<div class="container" style="padding-top: 50px;">
   <div class="row">
      <!-- Recipe Detail Column -->
      <div class="col-md-8"style="padding-bottom: 100px;">
         <h1 class="my-4">Here is your delicious recipe  <em style="padding-top:10px;" class="fa fa-hamburger" style = "font-size: 35px;"> </em>
         </h1> 

         <!-- Blog Post -->
         <div class="card mb-4">
            <img class="card-img-top" src="image/<?php echo $recipeDetail["pictures"]; ?>" alt="Card image cap">
               <div class="card-body">
                  <h2 class="card-title"><?php echo $recipeDetail["recipe_name"]; ?></h2>
                  <p class="card-text"><?php echo $recipeDetail["description"]; ?></p>
                  <h4>Ingredients</h4></br><p class="card-text"><?php echo $recipeDetail["ingredients"]; ?></p>
                  <h4>Duration</h4></br> <p class="card-text"><?php echo $recipeDetail["duration"]; ?></p></br>
                  <h4>Calori</h4></br> <p class="card-text"><?php echo $recipeDetail["calori"]; ?></p></br>
                  <h4>Class</h4></br> <p class="card-text"><?php echo $recipeDetail["class"]; ?></p></br>
               </div>
               <div class="card-footer text-muted">
                  Difficult : 

                  <?php
                  for ($y = 0; $y < $recipeDetail['difficult']; $y++) {
                     echo'&#9733;';
                  }
                  for ($y = 5; $y > $recipeDetail['difficult']; $y--) {
                     echo'&#9734;';
                  }
                  ?>
               </div>
         </div>

      </div>

      <!-- Sidebar Column -->
      <div class="col-md-4">
         <div class="card my-4">
            <div class="card-body">
               <div class="row">
                  <div class="col">
                     <button  onclick="window.location.href = 'category.php'"  type="button" class="btn btn-primary btn-lg btn-block">Back to Category</button>
                     </br>

                     <?php
                     // Only admin can see delete button
                     if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == "1") {
                        if (isset($_POST['del'])) {
                           deleteRecipe($db, $recipeId);
                        }
                        ?>
                        <form action=""method="post">
                           <button name="del" type="submit" class="btn btn-primary btn-lg btn-block">delete </button></form>
                     <?php } else { ?>
                        <button type="button" class="btn btn-primary btn-lg btn-block disabled">Only Admin Can Delete!</button>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <!-- Side Widget -->
         <div class="card my-4">
            <h5 class="card-header">Todays motto!</h5>
            <div class="card-body">
               Food is symbolic of love when words are inadequate!
            </div>
         </div>
      </div>
   </div>
</div>
<?php
include 'inc/footer.php';
