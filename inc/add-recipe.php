<?php

$additem = 'selected';
$siteTitle = "Add Recipes";

if (isset($_SESSION['userlogin']) && ($_SESSION['userlogin'] === 'OK')) {
   ?> 

   <section class="portfolio-block hire-me">
      <div class="container" data-aos="fade-up" data-aos-once="true"><div class="row">
            <div class="col" style="text-align: center;">
               <h2 style="color: rgb(118,75,196);font-size: 55px;transform: scale(1.01);border-bottom-style: none;text-shadow: 1px 0px 1px var(--white), 0px 1px 2px var(--dark), -1px 0px 2px var(--light), 0px -1px 2px var(--light), 0px 0px 3px var(--light);"><i class="fa fa-star" style="font-size: 35px;"></i>  Add Recipe  <i class="fa fa-star" style="font-size: 35px;"></i></h2>
            </div>
         </div>
         <form action="" method="post" style="background: #ffffff;border-width: 10px;border-color: var(--red);border-radius: 40px;">
            <div class="form-group">
               <label for="class">Type</label>
               <select required="" class="form-control" name="class" id="class">
                  <option value="" selected="">Choose Type of Your Recipe</option>
                  <option value="Breads, Muffins, & Scones"> Breads, Muffins, & Scones</option>
                  <option value="Breakfast"> Breakfast</option>
                  <option value="Desserts"> Desserts</option>
                  <option value="Dinner"> Dinner</option>
                  <option value="Dressings, Salsas, and Sauces">Dressings, Salsas, and Sauces</option>
                  <option value="Drinks"> DrinksD</option>
                  <option value="Lunch"> Lunch</option>
                  <option value="Main Courses"> Main Courses</option>
                  <option value="One Pot Meal"> One Pot Meal</option>
                  <option value="Pancakes and Toppings">Pancakes and Toppings</option>
                  <option value="Pizza">Pizza</option>
                  <option value="Quesadillas and Sandwiches">Quesadillas and Sandwiches</option>
                  <option value="Salads">Salads</option>
                  <option value="Side Dishes">Side Dishes</option>
                  <option value="Snacks">Snacks</option>
                  <option value="Soups">Soups</option>
                  <option value="Stews & ChiliSoups">Stews & ChiliSoups</option>
               </select></div>
            <div class="form-group"><label for="recipe_name">Recipe Name</label>
               <input required="" name="recipe_name" class="form-control" type="text" id="recipe_name"></div>

            <div class="form-group"><label for="keywords">Recipe keywords</label>
               <textarea required="" name="keywords" class="form-control" id="keywords"></textarea></div>

            <div class="form-group"><label for="ingredients">Ingredients</label>
               <input required="" name="ingredients" class="form-control" type="text" id="ingredients"></div>

            <div class="form-group"><label for="calori">Cook Calori</label>
               <input required="" name="calori" class="form-control" type="text" id="calori"></div>

            <div class="form-group"><label for="duration">Cook Duration</label>
               <input required="" name="duration" class="form-control" type="text" id="duration"></div>

            <div class="form-group"><label for="difficult">Cook Difficult (Score it with numbers from 1 to 5)</label>
               <input required="" name="difficult" class="form-control" type="number" max="5" min="1" id="difficult"></div>

            <div class="form-group"><label for="description">Description</label>
               <textarea required="" required="" name="description" class="form-control" id="description"></textarea></div>

            <div class="form-group"><label for="img_src">Cook Image (Add image to sourcefile/image folder) </label>
               <div class="form-group"><input  name="pictures" class="form-control-file" type="file"></div>

               <!-- File Input -->
               <!-- <div class="form-group"><input  name="file" class="form-control-file" type="file"></div> -->
               <div class="form-group">
                  <button name="recipe" class="btn btn-primary btn-block" data-bss-hover-animate="pulse" type="submit" style="background: #764BC4;">Add Recipes</button></div>
               <div class="w-100"></div>   


         </form> 
   </section>
   </main>
   
<?php   require 'footer.php'; } else {
   echo '</br></br></br></br>You should be login first'; }?>

   <script src="..js/jquery.min.js"></script>
   <script src="..bootstrap/js/bootstrap.min.js"></script>
   <script src="..js/bs-init.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
   <script src="..js/theme.js"></script>
   <?php

 
   