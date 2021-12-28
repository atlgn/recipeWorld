<?php

$host = "localhost";
$dbase = "farhenrecipe";
$user = "db";
$pd = "db";
$db = new mysqli($host, $user, $pd, $dbase);

if ($db->connect_error) {
   exit('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}
?>