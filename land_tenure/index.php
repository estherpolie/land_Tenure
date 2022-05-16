<?php
include('connection.php');
 session_start();
 $msg='';
if(isset($_POST["login"])){
$email = mysqli_real_escape_string($con, $_POST["email"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);
$query = "SELECT * FROM person WHERE email = '$email' and password='$password' limit 1";
$result = mysqli_query($con, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {
                   if ($row['status']=='Active' && $row['userType'] != 'Admin') {
                       $_SESSION["personId"]=$row['personId'];
                       $_SESSION["userType"]=$row['userType'];
                       $_SESSION["email"] = $row['email'];
                        header("location:home.php");
                   }elseif ($row['status']=='Active' && $row['userType'] == 'Admin') {
                       $_SESSION["personId"]=$row['personId'];
                       $_SESSION["userType"]=$row['userType'];
                       $_SESSION["email"] = $row['email'];
                        header("location:admin/home.php");
                   }
                   else{
                    $msg = "<p class='alert alert-danger'style='color:red;'>Account Locked Contact Administrator</p>";
                   }
                }
            }else{
                     $msg = "<p class='alert alert-danger'style='color:red;'>Incorrect UserName Or Password !!!</p>";
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
<div class="container position-relative">
                <div class="row min-vh-65 justify-content-center align-items-center py-6 py-md-12 g-4">
                    <div class="col-lg-4 col-xl-4">
                        
                    </div>
                    <div class="col-lg-4 col-xl-4 col-xxl-4  ">
                        <div class="card">
                            <div class="card-body p-4 p-lg-5">
                                <div class="text-center">
                                    <h5 class="h3">LogIn</h5>
                                    <p>Land Tenure System </p>
                                </div>
                                <div>
                                <?= $msg ?>
                                </div>
                                <form method="post">
                                    
                                    <div class="form-floating mb-4">
                                        <input id="email" type="email" name="email" placeholder="name@example.com" data-constraints="@Required" class="form-control" required>
                                        <label class="form-label" for="email">Email Address</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input id="password" type="password" name="password" placeholder="Password" data-constraints="@Required" class="form-control" required>
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <input type="submit" name="login" value="LogIn"class="btn btn-primary w-100" >
                                    <div class="snackbars" id="form-output-global"></div>
                                <div class="text-center">
                                    <p><br>Don't have an account? 
                                    <a href="registration.php" id="show-signup" class="link">SignUp</a> </p>
                                    
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4"></div>
                </div>
            </div>
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