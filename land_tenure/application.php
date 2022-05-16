<?php include('header.php');?>
<?php
$msg='';
if (isset($_POST['apply'])) {
    $type = mysqli_real_escape_string($con, $_POST["type"]);
    $parcel = mysqli_real_escape_string($con, $_POST["parcel"]);
    $description = mysqli_real_escape_string($con, $_POST["description"]);
if($description =="" || $type==""||$parcel==""){
$msg = "<p class='alert alert-danger'style='color:red;'>Field is empty</p>";
}else{
    $query=mysqli_query($con,"SELECT parcel_id FROM application WHERE parcel_id='$parcel'");
    if (mysqli_num_rows($query) > 0) {
      
       $msg = "<p class='alert alert-danger'style='color:red;'>Parcel Already Applied </p>";
    }else{
        $q=mysqli_query($con,"SELECT parcel_id FROM land WHERE parcel_id='$parcel'");
        if (mysqli_num_rows($q) > 0) {
        $query1=mysqli_query($con,"INSERT INTO application (infrastracture_category,description,investor_id,parcel_id,status) VALUES('".$type."','".$description."','".$id."','".$parcel."','"."Pending"."')");
      if ($query1) {
          $msg = "<p class='alert alert-success' style='color:green;'>Application Send Successfully</p>"; 
      }}else{
        $msg = "<p class='alert alert-danger'style='color:red;'>Parcel Not Found </p>";
      }
    }}
}
?>
    <main> <br><br>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 my-3">
                        <div class="card">
                            <div class="card-body p-4">
                                <h3 class="display-7 mb-4">Make Application</h3>
                                <div>
                                <?=
                                 $msg ?>
                                </div>
                                <form method="post">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="type">Infrastracture Type</label>
                                                <select class="form-control" name="type">
                            <option selected>Choose Infrastracture Type</option>
                            <option>Hotel</option>
                            <option>School</option>
                            <option>Hospital</option>
                        </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="parcel">Parcel Id</label>
                                                <input id="parcel" type="text" name="parcel" placeholder="Enter Parcel Id" data-constraints="@Required" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter some description ..." data-constraints="@Required"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                             <input type="submit" name="apply" value="Apply"class="btn btn-primary w-100" >
                                            <div class="snackbars" id="form-output-global"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 my-3">
                        <div class="card card-body p-2">
                            <div class="ratio ratio-1x1">
                                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1vi7GAHta9KlWK11Z-IJONx0T67Zm1-4Y" width="640" height="480"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
   <?php include('footer.php');?>