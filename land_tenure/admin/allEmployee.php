<?php include('header.php');?>
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
$gender = mysqli_real_escape_string($con, $_POST["gender"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);
$cpassword = mysqli_real_escape_string($con, $_POST["cpassword"]);
$work = mysqli_real_escape_string($con, $_POST["work"]);

    if ($password != $cpassword) {
            $msg = "<p class='alert alert-danger'style='color:red;'>Password Not Match</p>";
      }
      else if($userType == "Choose User Type" ){
          $msg = "<p class='alert alert-danger'style='color:red;'>Choose User Type</p>";
      }else if ($gender == "Choose Gender") {
          $msg = "<p class='alert alert-danger'style='color:red;'>Choose User Gender</p>";
      }
      else{
          $query =mysqli_query($con, "INSERT INTO person (firstName,lastName,email,phone,gender,userType,nationalId,password,status)
             VALUES('".$fname."','".$lname."','".$email."','".$phone."','".$gender."','".$userType."','".$nationalId."','".$password."','"."Active"."')");
          $lastId=mysqli_insert_id($con);
          if ($query) {
            if ($userType =='User') {
                $query =mysqli_query($con, "INSERT INTO engineer (workAddress,person_id)
             VALUES('".$work."','".$lastId."')");
              $msg = "<p class='alert alert-success' style='color:green;'>Account created successfully</p>";
            }else{
                $msg = "<p class='alert alert-success' style='color:green;'>Account created successfully</p>";
            }
            
          }else{
            $msg = "<p class='alert alert-danger'style='color:red;'>Account Not Created</p>";
          }
        }
      }
?>
<main style="height: 615px;">
<section ><br>
<div class="container"> 
    <h5 class="display-6 mb-4 font-w-300 text-center"> <span class="font-w-700">Manage Users Account</span>.</h5>
    <div style="float: right;">
  <button type="button" class="btn btn-primary approvebtn"> <i class="fas fa-plus"></i> Add User</button> 
    </div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>N<sup>o</sup></th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>UserType</th>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $c=0;
     $query=mysqli_query($con,"SELECT * FROM person WHERE userType in('User','Admin')");
     while ($row=mysqli_fetch_array($query)) {
        $c++;
    ?><tr>
        <td><?= $c?></td>
        <td><?= $row['firstName']?></td>
        <td><?= $row['lastName']?></td>
        <td><?= $row['email']?></td>
        <td><?= $row['userType']?></td>
        <td><?= $row['status']?></td>
        <td class="text-center">
                                        <div class="table-action">
                                            <a href="unlock.php?userId=<?= $row['personId']?>" class="btn btn-sm bg-success-light" name="unlock" style="color: #26af48;background-color: rgba(15, 183, 107,0.12);line-height: 1;
                                                  
                                                "> <i class="fas fa-unlock"></i> Unlock</a> 
                                            <a href="lock.php?userId=<?= $row['personId']?>" class="btn btn-sm bg-success-light" name="lock" style="background-color: rgba(242, 17, 54,0.12) !important;
                                             color: #e63c3c !important;    line-height: 1;">
                                                <i class="fas fa-lock"></i> Lock
                                                
                                            </a>
                                        </div>
                                            </td>
      </tr>
  <?php }?>
    </tbody>
  </table>
  
</div>
<div class="modal fade custom-modal" id="add_time_slot">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Add User</h5>
</div>
<div class="modal-body">
<div>
        <?= $msg ?>
        </div>
        <form method="post" >
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input id="first-name" type="text" name="fname" placeholder="Enter First Name" data-constraints="@Required" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input id="last-name" type="text" name="lname" placeholder="Enter Last Name" data-constraints="@Required" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="contact-email">Email Address</label>
                        <input id="contact-email" type="email" name="email" placeholder="name@example.com" data-constraints="@Required" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" class="form-control" id="phone"
                         placeholder="Enter Your Phone" data-constraints="@Required">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="userType">User Type</label>
                        <select class="form-control" name="userType">
                            <option selected>Choose Type</option>
                            <option>Admin</option>
                            <option>User</option>
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
                        <label for="work">Work Address</label>
                        <input type="text" name="work" class="form-control" id="work"
                         placeholder="Enter Work Address" data-constraints="@Required">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nationalId">National Id</label>
                        <input type="number" name="nationalId" class="form-control" id="nationalId"
                         placeholder="Enter Your National Id" data-constraints="@Required">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="contact-company">Password</label>
                        <input type="password" name="password" class="form-control" id="contact-company">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="contact-phone">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="contact-phone">
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="create" id="create" value="Create"class="btn btn-primary w-100 " >
                    <div class="snackbars" id="form-output-global"></div>
                </div>
            </div>
        </form>
</div>
</div>
</div>
</div>
</section>
    </main>
    
<?php include('footer.php');?>
<script>
	$(document).ready(function(){
		$('.approvebtn').on('click',function(){
			$('#add_time_slot').modal('show');
	});
        $('.create').on('click',function(){
            $('#add_time_slot').modal('show');
    });
		});
</script>