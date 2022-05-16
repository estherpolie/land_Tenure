<?php
include('connection.php');
$rec_id = $_POST['id'];
$output = '';
$sql = "SELECT * FROM property where application_id=".$rec_id;
$result = mysqli_query($con, $sql);
   while($row = mysqli_fetch_assoc($result)) {
   	$output .= "<h6 class='modal-title'>".$row['propertyName']."</h6>
   	<p class='mb-4'>".$row['description'].''.'with value of'.' '.$row['amount'].' '.'RWF'."</p>";
   }
   echo $output;
?>