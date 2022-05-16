<?php include('header.php')?>
<?php
$msg = '';
if(isset($_POST["send"])){
$description = mysqli_real_escape_string($con, $_POST["description"]);
$dates=Date('Y-m-d');
if($description==""){
$msg = "<p class='alert alert-danger'style='color:red;'>Field is empty</p>";
}else{
$query =mysqli_query($con, "INSERT INTO claim (person_id,description,created_at,status)
             VALUES('".$id."','".$description."','".$dates."','"."Not Solved"."')");
          if ($query) {
              $msg = "<p class='alert alert-success' style='color:green;'>Claim Send successfully</p>";
          }else{
             $msg = "<p class='alert alert-danger'style='color:red;'>Claim Not Send</p>";
          }}
      }
?>
    <!-- Main -->
    <main style="height: 615px;"><br>
        <section>
            <div class="container">
                <h5 class="display-6 mb-4 font-w-300 text-center"> <span class="font-w-700">Submit Your Claim Here</span>.</h5>
                
                <div class="row">
                    <div class="col-lg-2 my-3">
                    </div>
                    <div class="col-lg-8 my-3 pe-xl-7">
                        <div>
                <?= $msg ?>
                </div>
               <form method="post">
                        <div class="row">
                           <?php
                $query=mysqli_query($con,"SELECT * FROM person WHERE personId='$id'");
                while($row=mysqli_fetch_array($query)){
                    ?>
                                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="contact-email">Email Address</label>
                        <input id="contact-email" type="email" name="email" placeholder="name@example.com" value="<?=$row['email']?>"  data-constraints="@Required" class="form-control" readOnly>
                </div></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" class="form-control" id="phone"
                         placeholder="Enter Your Phone" value="<?=$row['phone']?>" data-constraints="@Required" readOnly>
                    </div>
                </div>
                <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Claim Detail</label>
                                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Claim Detail ..." data-constraints="@Required"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary w-100" value="Submit" name="send">
                                            <div class="snackbars" id="form-output-global"></div>
                                        </div>
                                    <?php }?>
                                    </div>
                                    
                                </form>
                                 </div>
                    <div class="col-lg-2 my-3">
                    </div>
                </div>
            </div>
        </section>
        </main>
    <!-- End Main -->
    <!-- Footer -->
    <?php include('footer.php')?>