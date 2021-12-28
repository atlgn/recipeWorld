<?php
ob_start();
$siteTitle = "Add Item";
$add_recipe = 'selected';
require'inc/connection.php';
require'inc/functions.php';
include'inc/header.php';

$ok = false;//check if it submited already and redict ok page
if (isset($_POST['recipe'])) { //post all data
   $recipe_name = trim(filter_input(INPUT_POST, 'recipe_name', FILTER_SANITIZE_STRING));
   $class = trim(filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING));
   $keywords = trim(filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING));
   $ingredients = trim(filter_input(INPUT_POST, 'ingredients', FILTER_SANITIZE_STRING));
   $calori = trim(filter_input(INPUT_POST, 'calori', FILTER_SANITIZE_STRING));
   $difficult = trim(filter_input(INPUT_POST, 'difficult', FILTER_SANITIZE_STRING));
   $duration = trim(filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_STRING));
   $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
   $pictures = trim(filter_input(INPUT_POST, 'pictures', FILTER_SANITIZE_STRING));
   //===== Add Recipe to the database ================================================================
   if (add_recipe($db, $recipe_name, $class, $keywords, $ingredients, $calori, $difficult, $duration, $description, $pictures)) {
      $ok = true;
      $recipeid = recipeIdFromName($db, $recipe_name);
      header('Location: viewitem.php?id='.$recipeid["recipe_id"]);
   }
}
if (!$ok) {
   include 'inc/add-recipe.php';
   exit();
}