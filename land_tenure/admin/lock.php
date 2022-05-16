<?php
include('connection.php');
    $userId=$_GET['userId'];
   $query=mysqli_query($con,"UPDATE person SET status='Inactive' WHERE personId='$userId'");
   header("location:allEmployee.php");
?>