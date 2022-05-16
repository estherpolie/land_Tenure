<?php include('header.php')?>
<?php
include('connection.php');
$msg = '';
if(isset($_POST["create"])){
$fname = mysqli_real_escape_string($con, $_POST["fname"]);
$lname = mysqli_real_escape_string($con, $_POST["lname"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$phone = mysqli_real_escape_string($con, $_POST["phone"]);
$userType = mysqli_real_escape_string($con, $_POST["userType"]);
$gender = mysqli_real_escape_string($con, $_POST["gender"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);
$cpassword = mysqli_real_escape_string($con, $_POST["cpassword"]);

    if ($password != $cpassword) {
            $msg = "<p class='alert alert-danger'style='color:red;'>Password Not Match</p>";
      }
      else if($userType == "Choose User Type" ){
          $msg = "<p class='alert alert-danger'style='color:red;'>Choose User Type</p>";
      }else if ($gender == "Choose Gender") {
          $msg = "<p class='alert alert-danger'style='color:red;'>Choose User Gender</p>";
      }
      else{
          $query =mysqli_query($con, "UPDATE person SET firstName='$fname',lastName='$lname',email='$email',phone='$phone',gender='$gender',userType='$userType',password='$password' WHERE personId='$id'");
          if ($query) {
              $msg = "<p class='alert alert-success' style='color:green;'>Account Updated successfully</p>";
          }else{
            $msg = "<p class='alert alert-danger'style='color:red;'>Account Not Updated </p>";
          }
        
}}
?>

    <!-- Main -->
    <main style="height: 700px;"><br>
        <section>
<div class="container">
<div class="row">
<div class="col-lg-3 my-3">

</div>
<div class="col-lg-6 my-3">
<div class="card">
    <div class="card-body p-4">
        <h3 class="display-7 mb-4 text-center">Update Your Account</h3>
        <div>
        <?= $msg ?>
        </div>
        <form method="post" >
            <div class="row">
                <?php
                $query=mysqli_query($con,"SELECT * FROM person WHERE personId='$id'");
                while($row=mysqli_fetch_array($query)){
                    ?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input id="first-name" type="text" name="fname" placeholder="Enter First Name" value="<?=$row['firstName']?>" data-constraints="@Required" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input id="last-name" type="text" name="lname" placeholder="Enter Last Name" value="<?=$row['lastName']?>" data-constraints="@Required" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="contact-email">Email Address</label>
                        <input id="contact-email" type="email" name="email" placeholder="name@example.com" value="<?=$row['email']?>"  data-constraints="@Required" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" class="form-control" id="phone"
                         placeholder="Enter Your Phone" value="<?=$row['phone']?>" data-constraints="@Required">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="userType">User Type</label>
                        <select class="form-control" name="userType">
                            <option value="" disabled="">Choose Type</option>
                            <option selected><?=$row['userType']?></option>
                            <option>Investor</option>
                            <option>Holder</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender">
                            <option value="" disabled="">Choose Gender</option>
                            <option selected><?=$row['gender']?></option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="contact-company">Password</label>
                        <input type="password" name="password" value="<?=$row['password']?>" class="form-control" id="contact-company">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="contact-phone">Confirm Password</label>
                        <input type="password" name="cpassword" value="<?=$row['password']?>" class="form-control" id="contact-phone">
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="create" value="Update Info"class="btn btn-primary w-100" >
                    <div class="snackbars" id="form-output-global"></div>
                </div>
            <?php }?>
            </div>
        </form>
    </div>
</div>
</div>
<div class="col-lg-3 my-3">

</div>
</div>
</div>
</section>
        </main>
    <!-- End Main -->
    <!-- Footer -->
    <?php include('footer.php')?>