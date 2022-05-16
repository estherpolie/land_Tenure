<?php
include('connection.php');
$rec_id = $_POST['id'];
$output = '';
$sql = "SELECT description FROM claim where claimId=".$rec_id;
$result = mysqli_query($con, $sql);
   while($row = mysqli_fetch_assoc($result)) {
   	$output .= $row['description'];
   }
   echo $output;
?>