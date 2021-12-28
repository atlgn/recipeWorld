<?php
$category = 'selected';  //Title 
$siteTitle = "Category"; //Title

require 'inc/header.php'; //header in
include_once 'search.php'; // search bar in
?>

<!--/ CAROUSEL PART HERE -->
<div class = "col-lg-9">  
   <div id = "carousel" style = "padding-bottom: 20px;"class = "carousel slide" data-ride = "carousel">
      <ol class = "carousel-indicators">
         <li data-target = "#carousel" data-slide-to = "0" class = "active"></li>
         <li data-target = "#carousel" data-slide-to = "1"></li>
         <li data-target = "#carousel" data-slide-to = "2"></li>
      </ol>  
      <div class = "carousel-inner">
         <div class = "carousel-item active">       
            <img class = "d-block w-100" src = "image/salad.jpg" style = "width:100%; height: 550px;"alt = "First slide">
         </div>
         <div class = "carousel-item">
            <img class = "d-block w-100" src = "image/3.jpg"style = "width:100%; height: 550px;" alt = "Second slide">
         </div>
         <div class = "carousel-item">
            <img class = "d-block w-100" src = "image/2.jpg"style = "width:100%; height: 550px;" alt = "Third slide">
         </div>
      </div>
      <a class = "carousel-control-prev" href = "#carousel" role = "button" data-slide = "prev">
         <span class = "carousel-control-prev-icon" aria-hidden = "true"></span>
         <span class = "sr-only">Previous</span>
      </a>
      <a class = "carousel-control-next" href = "#carousel" role = "button" data-slide = "next">
         <span class = "carousel-control-next-icon" aria-hidden = "true"></span>
         <span class = "sr-only">Next</span>
      </a>
   </div>
   <div class = "row">

      <?php
      // List All items with bootsrap card template
      if ($r->num_rows > 1) { // if records exist and more than one rec returned
         while ($rec = $r->fetch_assoc()) {
            ?>
            <div class = "col-lg-4 col-md-6 mb-4">
               <div class = "card h-100">   
                  <a href = "viewitem.php?id=<?php echo $rec["recipe_id"] ?>">
                     <img style="max-height: 200px;"class = "card-img-top img-thumbnail " src = "image/<?php echo $rec['pictures']; ?>" alt = ""></a>
                  <div class = "card-body">
                     <h4 class = "card-title">
                        <a href = "viewitem.php?id=<?php echo $rec["recipe_id"] ?>"><?php echo $rec['recipe_name']; ?></a>
                     </h4>
                     <h5> <?php echo $rec['duration']; ?> </h5>
                     <p class = "card-text"> <?php echo $rec['descshort']; ?>
                        ...</br><a href="viewitem.php?id=<?php echo $rec["recipe_id"] ?>">Click for more info </a>
                     </p>
                  </div>
                  <div class = "card-footer">
                     <small class = "text-muted">  Difficult :       <!-- Difficult set star -->
                        <?php
                        for ($y = 0; $y < $rec['difficult']; $y++) {
                           echo'&#9733;';
                        }
                        for ($y = 5; $y > $rec['difficult']; $y--) {
                           echo'&#9734;';
                        }
                        ?>
                     </small>
                  </div>
               </div>
            </div>
            <?php
         }
      } else if ($r->num_rows == 1) { // If row < 1 this code working to block about footer section sticking up
         while ($rec = $r->fetch_assoc()) {
            ?>
            <div class = "col-lg-4 col-md-6 mb-4" style="padding-bottom: 100px;">
               <div class = "card h-100">
                  <a href = "viewitem.php?id=<?php echo $rec["recipe_id"] ?>"><img class = "card-img-top img-thumbnail" src = "image/<?php echo $rec['pictures']; ?>" alt = ""></a>
                  <div class = "card-body">
                     <h4 class = "card-title">
                        <a href = "viewitem.php?id=<?php echo $rec["recipe_id"] ?>"><?php echo $rec['recipe_name']; ?></a>
                     </h4>
                     <h5><?php echo $rec['duration']; ?></a> </h5>
                     <p class = "card-text"><?php echo $rec['descshort']; ?>
                        ...</br><a href="viewitem.php?id=<?php echo $rec["recipe_id"] ?>">Click for more info </a>
                     </p>
                  </div>
                  <div class = "card-footer">
                     <small class = "text-muted">  Difficult : 

                        <?php
                        for ($y = 0; $y < $rec['difficult']; $y++) {
                           echo'&#9733;';
                        }
                        for ($y = 5; $y > $rec['difficult']; $y--) {
                           echo'&#9734;';
                        }
                        ?></small>
                  </div>
               </div>
            </div>
            <?php
         }
      } else {
         ?>
         <script type='text/javascript'> /*if no row about data show 404 no data find*/
            document.getElementById("carousel").style.display = "none";
         </script>
         <div class = "col-lg-12 col-md-12 mb-12 col-xl-12">
            <div class = "card h-100">
               <a href = "#"><img class = "card-img-top" src ='\image\pablo.jpg' alt = ""></a>
               <div class = "card-body" ><h4>
                     Sorry... There is no recipe <i class="fa fa-frown-o"></i> Do you want to <a href="add.php">add ?</a>  
                 </h4>     
               </div>        
            </div>
         </div>
      </div><div style="padding-bottom: 50%;"></div>

   <?php } ?>

</div>
</div>
</div>
</div>
<!--container end-->

<!--Footer-->
<?php
require 'inc/footer.php';
