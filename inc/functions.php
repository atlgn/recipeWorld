<?php
ob_start();
//if user login already reddirect user 
function redirectisuserlogin(){
   if(isset($_SESSION['userlogin']) && $_SESSION['userlogin']=="OK"){
   header('location:../index.php');
}}

function redirectisNotuserlogin(){
   if(!isset($_SESSION['userlogin']) && $_SESSION['userlogin']=="OK"){
   header('location:../index.php');
}
}

function add_recipe($db, $recipe_name, $class, $keywords, $ingredients, $calori, $difficult, $duration, $description, $pictures) {
   $query = 'INSERT INTO `recipes` (`recipe_name`, `class`, `keywords`, `ingredients`, `calori`, `difficult`, `duration`, `description`, `pictures`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

   $stmt = $db->stmt_init();
   $stmt->prepare($query) or exit('Query Error.' . $db->errno);
   $stmt->bind_param('sssssssss', $recipe_name, $class, $keywords, $ingredients, $calori, $difficult, $duration, $description, $pictures) or exit('Bind Param Error.');
   $stmt->execute() or exit('Query Execution failed.' . $db->errno);
   if ($stmt->affected_rows > 0) {
      return true;
   }
   $stmt->close();
   $db->close();
}

function getuser($db,$username){
   $query = 'select * from user where username=?';
   $stmt = $db->stmt_init();
   $stmt->prepare($query) or exit('Query Error.' . $db->errno);
   @$stmt->bind_param('s', trim($username)) or exit('Bind Param Error.');
   $stmt->execute() or exit('Query Execution failed.' . $db->errno);
   $r = $stmt->get_result();
   
   while ($rec = $r->fetch_assoc()) {
      return $rec;
   }
}


function searchrecipe($db, $name, $slc) {

   $query = 'select recipe_id,recipe_name,class,keywords,ingredients,calori,difficult,SUBSTRING(description,1,50) as descshort,duration,pictures,fkuserid  from recipes where ';
   if ($slc == 'k') {
      $query .= "keywords like ?";
      $name = '%'.$name."%";
   } else if ($slc == 'n') {
      $query .= "recipe_name like ?";
      $name = '%'.$name."%";
   } else if ($slc = 'c') {
      $query .= "calori like ?";
      $name = '%'.$name."%";
   } else {
      echo '<script type="text/javascript">alert("Select type to search");</script>';
   }
   $stmt = $db->stmt_init();
   $stmt->prepare($query) or exit('Query Error.' . $db->errno);
   @$stmt->bind_param('s', trim($name)) or exit('Bind Param Error.');
   $stmt->execute() or exit('Query Execution failed.' . $db->errno);
   $r = $stmt->get_result();
   
   return $r;
}

function recipedetail($db, $recipeid) {

   $query = 'select * from recipes where recipe_id= ? ';
   
   $stmt = $db->stmt_init();
   $stmt->prepare($query) or exit('Query Error.' . $db->errno);
   @$stmt->bind_param('i', trim($recipeid)) or exit('Bind Param Error.');
   $stmt->execute() or exit('Query Execution failed.' . $db->errno);
   $r = $stmt->get_result();
   while ($rec = $r->fetch_assoc()) {
      return $rec;
   }
}

function recipeIdFromName($db, $recipename) {

   $query = 'select recipe_id from recipes where recipe_name= ? ';
   
   $stmt = $db->stmt_init();
   $stmt->prepare($query) or exit('Query Error.' . $db->errno);
   @$stmt->bind_param('s', trim($recipename)) or exit('Bind Param Error.');
   $stmt->execute() or exit('Query Execution failed.' . $db->errno);
   $r = $stmt->get_result();
   while ($rec = $r->fetch_assoc()) {
      return $rec;
   }
}
function  deleteRecipe($db, $recipe_id){

   $query = "DELETE FROM recipes WHERE recipe_id =?";
 $st= mysqli_stmt_init($db);
 mysqli_stmt_prepare($st, $query) or exit('Query error');
 
 @mysqli_stmt_bind_param($st,'s', $recipe_id) or exit('Binding error');
 mysqli_stmt_execute($st); // omitted or exit('Query execution failed');
 
 if (mysqli_affected_rows($db)>0){

header('Location : delete.php');
echo "<script type='text/javascript'>alert('succesfully deleted'); window.top.location='category.php';</script>"; exit;
 }else{ 
    echo "Error in delete<br/>";
}}

