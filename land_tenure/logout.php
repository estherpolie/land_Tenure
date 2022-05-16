<?php
include('connection.php');
  error_reporting(1);
  unset($_SESSION["id"]);
  header('Location:index.php'); 
?>