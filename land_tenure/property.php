<?php include('header.php');?>
<main style="height: 615px;"><br>
<section>
 <div class="container">
 <h5 class="display-6 mb-4 font-w-300 text-center"> <span class="font-w-700">My Properties</span>.</h5> 
  <table class="table table-hover">
    <thead>
      <tr>
        <th>N<sup>o</sup></th>
        <th>Parcel Id</th>
        <th>UPI</th>
        <th>Area (m<sup>2</sup>)</th>
        <th>Village</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $c=0;
     $query=mysqli_query($con,"SELECT * FROM person p, land l,village v WHERE p.nationalId=l.national_id and v.id=l.address and p.personId='$id'");
     while ($row=mysqli_fetch_array($query)) {
        $c++;
    ?>
      <tr>
          <td><?= $c?></td>
          <td><?= $row['parcel_id']?></td>
          <td><?= $row['upi']?></td>
          <td><?= $row['area']?></td>
          <td><?= $row['name']?></td>
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
                        <input id="property-name" type="text" name="propertyName" placeholder="Enter Property Name" data-constraints="@Required" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input id="amount" type="number" name="amount" placeholder="Enter Amount" data-constraints="@Required" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter some description ..." data-constraints="@Required"></textarea>
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