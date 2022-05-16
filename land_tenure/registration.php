<?php
include('connection.php');
$msg = '';
if(isset($_POST["create"])){
$fname = mysqli_real_escape_string($con, $_POST["fname"]);
$lname = mysqli_real_escape_string($con, $_POST["lname"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$phone = mysqli_real_escape_string($con, $_POST["phone"]);
$userType = mysqli_real_escape_string($con, $_POST["userType"]);
$nationalId = mysqli_real_escape_string($con, $_POST["nationalId"]);
$passportId = mysqli_real_escape_string($con, $_POST["passportId"]);
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
        if ($userType == 'Holder') {
            $query=mysqli_query($con,"SELECT * FROM land WHERE national_id='$nationalId'");
            //$query1=mysqli_num_rows($query);
            if (mysqli_num_rows($query) > 0) {
                $query =mysqli_query($con, "INSERT INTO person (firstName,lastName,email,phone,gender,userType,nationalId,password,status)
             VALUES('".$fname."','".$lname."','".$email."','".$phone."','".$gender."','".$userType."','".$nationalId."','".$password."','"."Active"."')");
                if ($query) {
              $msg = "<p class='alert alert-success' style='color:green;'>Account created successfully</p>";
          }
            }
            else{
               $msg = "<p class='alert alert-danger'style='color:red;'>National Id Not Found</p>";
            }
        }else{
          $query =mysqli_query($con, "INSERT INTO person (firstName,lastName,email,phone,gender,userType,nationalId,password,status,passportId)
             VALUES('".$fname."','".$lname."','".$email."','".$phone."','".$gender."','".$userType."','".$nationalId."','".$password."','"."Active"."','".$passportId."')");
          if ($query) {
              $msg = "<p class='alert alert-success' style='color:green;'>Account created successfully</p>";
          }
        }
      }

}
?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from pxdraft.com/wrap/ensure/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Jun 2021 07:47:02 GMT -->
<head>
<!-- Title -->
<title>Land tenure</title>
<!-- Required Meta Tags Always Come First -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">
<!-- CSS Template -->
<link href="static/css/style.css" rel="stylesheet">
</head>

<body>
<section class="section">
<div class="container">
<div class="row">
<div class="col-lg-3 my-3">

</div>
<div class="col-lg-6 my-3">
<div class="card">
    <div class="card-body p-4">
        <h3 class="display-7 mb-4 text-center">Create Account</h3>
        <div>
        <?= $msg ?>
        </div>
        <form method="post" >
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input id="first-name" type="text" name="fname" placeholder="Enter First Name" data-constraints="@Required" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input id="last-name" type="text" name="lname" placeholder="Enter Last Name" data-constraints="@Required" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="contact-email">Email Address</label>
                        <input id="contact-email" type="email" name="email" placeholder="name@example.com" data-constraints="@Required" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" class="form-control" id="phone"
                         placeholder="Enter Your Phone" data-constraints="@Required" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="userType">User Type</label>
                        <select class="form-control" name="userType">
                            <option selected>Choose Type</option>
                            <option>Investor</option>
                            <option>Holder</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender">
                            <option selected>Choose Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nationalId">National Id</label>
                        <input type="number" name="nationalId" class="form-control" id="nationalId"
                         placeholder="Enter Your National Id" data-constraints="@Required" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="passportId">Passport Id (Optional)</label>
                        <input type="number" name="passportId" class="form-control" id="passportId"
                         placeholder="Enter Your Passport Id" data-constraints="@Required" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="contact-company">Password</label>
                        <input type="password" name="password" class="form-control" id="contact-company" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="contact-phone">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="contact-phone" required>
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="create" value="Registration"class="btn btn-primary w-100" >
                    <div class="snackbars" id="form-output-global"></div>
                </div>
            </div>
            <div class="text-center">
            <p><br>Already have an account? 
            <a href="index.php" id="show-signup" class="link">SignIn</a> </p>
            
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
<script src="static/js/jquery-3.5.1.min.js"></script>
<!-- appear -->
<script src="static/vendor/appear/jquery.appear.js"></script>
<!--bootstrap-->
<script src="static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- countTo -->
<script src="static/vendor/counter/jquery.countTo.js"></script>
<!-- owl-carousel -->
<script src="static/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<!-- magnific -->
<script src="static/vendor/magnific/jquery.magnific-popup.min.js"></script>
<!-- jarallax -->
<script src="static/vendor/jarallax/jarallax-all.js"></script>
<!-- working form -->
<script src="static/vendor/mail/js/form.min.js"></script>
<script src="static/vendor/mail/js/script.js"></script>
<!-- Theme Js -->
<script src="static/js/custom.js"></script>
</body>
<!-- end body -->


<!-- Mirrored from pxdraft.com/wrap/ensure/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Jun 2021 07:47:02 GMT -->
</html>