<?php include('header.php');?>
<?php
$description='';
if (isset($_POST['send'])) {
$user = mysqli_real_escape_string($con, $_POST["user"]);
$appId=$_POST['appointmentId'];
$query=mysqli_query($con,"INSERT INTO task (person_id,application_id) VALUES('".$user."','".$appId."')");
if($query){
$dates=Date('Y-m-d');
$query=mysqli_query($con,"UPDATE application SET status='Assigned',updated_at='$dates' WHERE appId='$appId'");
}
}
if (isset($_POST['rejectApp'])) {
$appId=$_POST['rejected'];
$dates=Date('Y-m-d');
$query=mysqli_query($con,"UPDATE application SET status='Rejected',updated_at='$dates' WHERE appId='$appId'");
if($query){
  $sql=mysqli_query($con,"SELECT email FROM person p,application a where p.personId=a.investor_id and a.appId='$appId'");
  while ($row=mysqli_fetch_array($sql)) {
    $email=$row['email'];
$msg = "Your Application has been Rejected";
                  $msg = wordwrap($msg,70);
                  mail($email,"Application progress",$msg,'From: mukunzichristian@gmail.com');
                }
              }
}
if (isset($_POST['approve'])) {
$appId=$_POST['appointment'];
$dates=Date('Y-m-d');
$query=mysqli_query($con,"UPDATE application SET status='Approved',updated_at='$dates' WHERE appId='$appId'");
if($query){
  $sql=mysqli_query($con,"SELECT email FROM person p,application a where p.personId=a.investor_id and a.appId='$appId'");
  while ($row=mysqli_fetch_array($sql)) {
    $email=$row['email'];
$msg = "Your Application has been Approved";
                  $msg = wordwrap($msg,70);
                  mail($email,"Application progress",$msg,'From: mukunzichristian@gmail.com');
                }
              }
}
if (isset($_POST['viewDesc'])) {

$appId=$_POST['id'];
$query=mysqli_query($con,"SELECT description FROM application WHERE appId='$appId'");
while ($row=mysqli_fetch_array($query)) {
$description="hello chris";
}
}
?>
<main style="height: 615px;"><br>
<section >
<div class="container"> 
<h5 class="display-6 mb-4 font-w-300 text-center"> <span class="font-w-700">All Applications</span>.</h5>
<div style="float: right;">
<form method="POST" action="print.php">
<button type="submit"  class="btn btn-primary" name="print">Print Report</button>
</form> 
</div>
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
$query=mysqli_query($con,"SELECT * FROM application ORDER BY appId DESC");
while ($row=mysqli_fetch_array($query)) {
$c++;
?>
<tr>
<td><?= $c?></td>
<td><?= $row['infrastracture_category']?></td>
<td><?php 
$mess=$row['description'];
$string = strip_tags($mess);
if (strlen($string) > 18) {
$stringCut = substr($string, 0, 20);
$endPoint = strrpos($stringCut, ' ');

$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
$string .='...';

}
echo $string;
?></td>
<td><?= $row['parcel_id']?></td>
<td><?= $row['status']?></td>
<td class="text-center">
            <div class="table-action">
              <?php
                     if($row['status'] =='Pending'){?>
                      <button type="button" 
                        data-id="<?= $row['appId']?>" name="viewDesc"
                        class="btn btn-sm bg-success-light viewbtn" style="background-color: rgba(2, 182, 179,0.12) !important;
                     color: #1db9aa !important;line-height: 1;"> <i class="fas fa-eye"></i> View
                   </button>
                    <button type="button" 
                      data-id="<?= $row['appId']?>"
                     class="btn btn-sm bg-success-light assignbtn" style="background-color: rgba(2, 182, 179,0.12) !important;
                     color: #1db9aa !important;line-height: 1;"> <i class="fas fa-plus"></i> Assign
                   </button> 
                     
                    <button title="Not Clickable" type="button" class="btn btn-sm bg-success-light" style="border: 1px solid #999999;
                    background-color: #cccccc;
                    color: #666666;
                  line-height: 1;  
                    "> <i class="fas fa-check"></i> Approve</button> 
                <button title="Not Clickable" type="button" class="btn btn-sm bg-success-light" style="border: 1px solid #999999;
                    background-color: #cccccc;
                    color: #666666;
                  line-height: 1;">
                    <i class="fas fa-times"></i> Reject
                    
                </button>
              <?php }else if($row['status'] =='Recorded'){?>
                <button type="button" 
                        data-id="<?= $row['appId']?>"
                        class="btn btn-sm bg-success-light viewbtn" style="background-color: rgba(2, 182, 179,0.12) !important;
                     color: #1db9aa !important;line-height: 1;"> <i class="fas fa-eye"></i> View
                   </button>
                <button title="Not Clickable" type="button"
               class="btn btn-sm bg-success-light " style="border: 1px solid #999999;
                    background-color: #cccccc;
                    color: #666666;
                  line-height: 1;"> <i class="fas fa-plus"></i> Assign</button> 
                     
                    <button type="button" data-id="<?= $row['appId']?>" class="btn btn-sm bg-success-light approvebtn" style="color: #26af48;background-color: rgba(15, 183, 107,0.12);line-height: 1;
                      
                    "> <i class="fas fa-check"></i> Approve</button> 
                <button type="button" data-id="<?= $row['appId']?>" class="btn btn-sm bg-success-light rejectbtn" style="background-color: rgba(242, 17, 54,0.12) !important;
                 color: #e63c3c !important;    line-height: 1;">
                    <i class="fas fa-times"></i> Reject
                    
                </button>
                <?php }else{?>
                  <button type="button" 
                        data-id="<?= $row['appId']?>"
                        class="btn btn-sm bg-success-light viewbtn" style="background-color: rgba(2, 182, 179,0.12) !important;
                     color: #1db9aa !important;line-height: 1;"> <i class="fas fa-eye"></i> View
                   </button>

                <button title="Not Clickable" type="button"
               class="btn btn-sm bg-success-light " style="border: 1px solid #999999;
                    background-color: #cccccc;
                    color: #666666;
                  line-height: 1;"> <i class="fas fa-plus"></i> Assign</button> 
                     
                    <button type="button" title="Not Clickable" data-id="<?= $row['appId']?>" class="btn btn-sm bg-success-light " style="border: 1px solid #999999;
                    background-color: #cccccc;
                    color: #666666;
                  line-height: 1;"> <i class="fas fa-check"></i> Approve</button> 
                <button type="button" title="Not Clickable" data-id="<?= $row['appId']?>" class="btn btn-sm bg-success-light " style="border: 1px solid #999999;
                    background-color: #cccccc;
                    color: #666666;
                  line-height: 1;">
                    <i class="fas fa-times"></i> Reject
                    
                </button>
                <?php }?>
            </div>
                </td>
                <div class="modal fade" id="ConfirmModal" aria-hidden="true" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document" >
<div class="modal-content">
<div class="modal-body">
<div class="form-content p-2 text-center">
<h4 class="modal-title">Approve</h4>
<p class="mb-4">Are you sure want to approve this application?</p>
<div id="load">
</div> 
<form method="POST" action="">
<input type="hidden" name="appointment" id="appointment">
<input type="submit" class="btn btn-primary" value="Yes" name="approve" style="background-color: #00d0f1;border: none;"> </input>
<input type="submit" class="btn btn-primary" value="No" style="background-color: #e84646;border: none;"> </input>

</form>
</div>
</div>
</div>
</div>
</div>
<!-- view description modal -->

</tr>
<?php }?>
</tbody>
</table>

</div>
<div class="modal fade" id="viewModal" aria-hidden="true" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document" >
<div class="modal-content">
<div class="modal-body">
<div class="form-content p-2 text-center">
<h4 class="modal-title">View Detail</h4>
<p class="mb-4" id="view"></p>
</div>
</div>
</div>
</div>
</div>
<!-- Assign Application Modal -->
<div class="modal fade custom-modal" id="assign">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Assign Application </h5>
</div>
<div class="modal-body">
<form method="post">
        <div class="row">
           
                <div class="form-group">
<label for="userType"> UserName</label>
<select class="form-control" name="user">
<option selected>Select User</option>
<?php
$query=mysqli_query($con,"SELECT * FROM person WHERE userType='User'");
while($row=mysqli_fetch_array($query)){
?>
<option value="<?= $row['personId']?>"><?= $row['email']?></option>
<?php }?>
</select>
</div>
<input type="hidden" name="appointmentId" id="appointmentId">
            <div class="col-12">
                <input type="submit" class="btn btn-primary w-100" value="Assign" name="send">
                <div class="snackbars" id="form-output-global"></div>
            </div>
        </div>
        
    </form>
</div>
</div>
</div>
</div>
<!-- /Assign Application Modal -->
<!-- approve Application Modal -->
<!-- /approve Application Modal -->
<!-- Reject Application Modal -->
<div class="modal fade" id="rejectModal" aria-hidden="true" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document" >
<div class="modal-content">
<div class="modal-body">
<div class="form-content p-2 text-center">
<h4 class="modal-title">Reject</h4>
<p class="mb-4">Are you sure want to Reject this application?</p>
<form method="POST">
<input type="hidden" name="rejected" id="app">
<input type="submit" class="btn btn-primary" value="Yes" name="rejectApp" style="background-color: #00d0f1;border: none;"> </input>
<input type="submit" class="btn btn-primary" value="No" style="background-color: #e84646;border: none;"> </input>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- /Reject Application Modal -->
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
$('.approvebtn').on('click',function(){
$('#ConfirmModal').modal('show');
let id=$(this).data('id');
$("#appointment").val(id);
});
$('.rejectbtn').on('click',function(){
$('#rejectModal').modal('show');
let id=$(this).data('id');
$("#app").val(id);
});
$('.viewbtn').on('click',function(){
$('#viewModal').modal('show');

});
});


</script>
<script>

$(document).ready(function(){
$(".viewbtn").click(function(){
var ids = $(this).data('id');
$.ajax({
url:"loadDescription.php",
method:'POST',
data:{id:ids},
success:function(data){

$('#view').html(data);

}

})
});
$(".approvebtn").click(function(){
var ids = $(this).data('id');
$.ajax({
url:"loadDataProperty.php",
method:'POST',
data:{id:ids},
success:function(data){

$('#load').html(data);

}

})
});

})

</script>