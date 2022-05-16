<?php include('header.php');?>
<?php
if (isset($_POST['send'])) {
  $propertyName = mysqli_real_escape_string($con, $_POST["propertyName"]);
  $amount = mysqli_real_escape_string($con, $_POST["amount"]);
  $description = mysqli_real_escape_string($con, $_POST["description"]);
  $appId=$_POST['appointmentId'];
  $query=mysqli_query($con,"INSERT INTO property (propertyName,amount,description,application_id,person_id) VALUES('".$propertyName."','".$amount."','".$description."','".$appId."','".$id."')");
  if($query){
    $dates=Date('Y-m-d');
    $query=mysqli_query($con,"UPDATE application SET status='Recorded',updated_at='$dates' WHERE appId='$appId'");
  }
}

?>
<main style="height: 615px;"><br>
<section>
 <div class="container">
 <h5 class="display-6 mb-4 font-w-300 text-center"> <span class="font-w-700">Assigned Tasks</span>.</h5> 
  <table class="table table-hover">
    <thead>
      <tr>
        <th>N<sup>o</sup></th>
        <th>Infrastructure</th>
        <th>Description</th>
        <th>Parcel</th>
        <th>Status</th>
        <th colspan="3" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $c=0;
     $query=mysqli_query($con,"SELECT * FROM application a, task t WHERE a.appId=t.application_id AND t.person_id='$id' AND a.status='Assigned' ORDER BY appId DESC");
     while ($row=mysqli_fetch_array($query)) {
        $c++;
    ?>
      <tr>
          <td><?= $c?></td>
          <td><?= $row['infrastracture_category']?></td>
          <td><?= $row['description']?></td>
          <td><?= $row['parcel_id']?></td>
          <td><?= $row['status']?></td>

          <td class="text-center">
                                        <div class="table-action">
             <button type="button" 
 data-id="<?= $row['appId']?>"
             class="btn btn-sm bg-success-light assignbtn" style="background-color: rgba(2, 182, 179,0.12) !important;
                                                 color: #1db9aa !important;line-height: 1;"> <i class="fas fa-plus"></i> Add Property</button> 
                                                
                                        </div>
                                            </td>
      </tr>
  <?php }?>
    </tbody>
  </table>
  
</div>
<!-- Assign Application Modal -->
<div class="modal fade custom-modal" id="assign">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Record Property </h5>
</div>
<div class="modal-body">
<form method="post">
                                    <div class="row">
                                       
                                            <div class="col-sm-6">
                    <div class="form-group">
                        <label for="property-name">PropertyName</label>
                        <input id="property-name" type="text" name="propertyName" placeholder="Enter Property Name" data-constraints="@Required" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input id="amount" type="number" name="amount" placeholder="Enter Amount" data-constraints="@Required" class="form-control" required>
                    </div>
                </div>
                <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter some description ..." data-constraints="@Required" required></textarea>
                                            </div>
                                        </div>
                    <input type="hidden" name="appointmentId" id="appointmentId">
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary w-100" value="Record" name="send">
                                            <div class="snackbars" id="form-output-global"></div>
                                        </div>
                                    </div>
                                    
                                </form>
</div>
</div>
</div>
</div>
<!-- /Assign Application Modal -->

</section>
    </main>
    
<?php include('footer.php');?>
<script>
	$(document).ready(function(){
		$('.assignbtn').on('click',function(){
			$('#assign').modal('show');
            let id=$(this).data('id');
            $("#appointmentId").val(id);
	});
       
		});
     
        
</script>