<?php include('header.php');?>
<?php

if (isset($_POST['approve'])) {
   $claimId=$_POST['appointment'];
   $dates=Date('Y-m-d');
 $query=mysqli_query($con,"UPDATE claim SET status='Solved',updated_at='$dates' WHERE claimId='$claimId'");
}
?>
<main style="height: 615px;"><br>
<section >
 <div class="container"> 
  <h5 class="display-6 mb-4 font-w-300 text-center"> <span class="font-w-700">System Claims</span>.</h5>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>N<sup>o</sup></th>
        <th>Email</th>
        <th>Description</th>
        <th>Status</th>
        <th colspan="3" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $c=0;
     $query=mysqli_query($con,"SELECT c.claimId,c.description,c.status,p.email FROM claim c, person p WHERE c.person_id=p.personId ORDER BY claimId DESC");
     while ($row=mysqli_fetch_array($query)) {
        $c++;
    ?>
      <tr>
          <td><?= $c?></td>
          <td><?= $row['email']?></td>
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
          <td><?= $row['status']?></td>
          <td class="text-center">
                                        <div class="table-action">
                                          
                                            <button type="button" 
                                      data-id="<?= $row['claimId']?>"
                                      class="btn btn-sm bg-success-light assignbtn" style="background-color: rgba(2, 182, 179,0.12) !important;
                                                 color: #1db9aa !important;line-height: 1;"> <i class="fas fa-eye"></i> View</button>
                                                 
                                                <button type="button" data-id="<?= $row['claimId']?>" class="btn btn-sm bg-success-light approvebtn" style="color: #26af48;background-color: rgba(15, 183, 107,0.12);line-height: 1;
                                                  
                                                "> <i class="fas fa-check"></i> Solve</button>
                                        </div>
                                            </td>
<div class="modal fade" id="assign" aria-hidden="true" role="dialog">
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
<div class="modal fade" id="ConfirmModal" aria-hidden="true" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document" >
<div class="modal-content">
<div class="modal-body">
<div class="form-content p-2 text-center">
<h4 class="modal-title">Solve Issue</h4>
<p class="mb-4">Are you sure the issue solved?</p>
  
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
      </tr>
  <?php }?>
    </tbody>
  </table>
  
</div>
<!-- Assign Application Modal -->

<!-- /Assign Application Modal -->
<!-- approve Application Modal -->
<div class="modal fade" id="ConfirmModal" aria-hidden="true" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document" >
<div class="modal-content">
<div class="modal-body">
<div class="form-content p-2 text-center">
<h4 class="modal-title">Approve</h4>
<p class="mb-4">Are you sure want to approve this application?</p>
  
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
<!-- /approve Application Modal -->
<!-- Reject Application Modal -->

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
		});   
</script>
<script>
    
    $(document).ready(function(){
      $(".assignbtn").click(function(){
        var ids = $(this).data('id');
         $.ajax({
           url:"loadDescriptionClaim.php",
           method:'POST',
           data:{id:ids},
           success:function(data){
             
             $('#view').html(data);
           
           }
           
         })
      })
      
    })
    
    </script>