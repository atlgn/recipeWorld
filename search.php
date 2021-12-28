<?php
$search_page = 'selected';
$name = strtoupper(filter_input(INPUT_POST, 'name'));
$slc = filter_input(INPUT_POST, 'slc');
require 'inc/connection.php';
require 'inc/functions.php';
$r = searchrecipe($db, $name, $slc);
?>

<!-- Page Content -->
<div class="container" style="padding-top: 80px;">
   <div class="row">

      <div class="col-lg-3" style="padding-top: 50px"><div class="row">
            <div class="col-md-12 ">
               <img src="image/logo.PNG"alt="Responsive image" width="270px" height="220px" class="wobble-hor-bottom">
            </div></div>

         <div class="row"> <div class="col-md-12">
               <div class="card my-4">
                  <div class="card-body">
                     <div class="input-group">
                        <form action="" method="post" >
                           <div style="padding-bottom: 20px;">
                              <select class="form-control" name="slc" id="class">
                                 <option value="" disabled>Select your type of search</option>
                                 <option disabled>________________</option>
                                 <option value="k"> Keyword</option>
                                 <option value="n" selected> Name</option>
                                 <option value="c"> Calori</option>
                              </select>
                           </div>
                           <input  type="text" name="name" class="form-control" placeholder="Search for...">
                              <span  style="padding-top: 10px;"class="input-group-append">
                                 <button style="padding-bottom: 10px;" type="submit" name="submit" class="btn btn-secondary" type="button">Go!</button>
                              </span>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <h1 class="my-4 card-header"></h1>			
         <div class="list-group">
         </div>
      </div>