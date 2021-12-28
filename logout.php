<?php
session_start();
$_SESSION=array();
session_destroy();
session_reset();
header('location:index.php');