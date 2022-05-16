
    <?php include('header.php')?>
    <!-- Main -->
    <main><br>
        <!-- Home Banner -->
        <section class=" bg-gray-100">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-lg-9 ps-xl-9 mt-5 mt-lg-0" >
                        <div class="card mt-5">
                            <div class="card-header border-bottom p-3">
                                <span class="h5 m-0">View Notification</span>
                            </div>
                            <div class="list-group list-group-flush">
                                <?php
                                if($title=='Investor'){
                                    ?>
                                <?php
                                $query=mysqli_query($con,"SELECT * FROM application WHERE investor_id='$id' AND status IN('Approved','Rejected','Paid')");
                                while ($row=mysqli_fetch_array($query)) {
                                  if ($row['status']=='Approved') {
                                       
                                ?>
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between py-3">
                                    <div style="display: flex; justify-content: space-between; align-items: center">
                                        <span><b>Congratulation</b> Your Application to the Parcel Id <b><?= $row['parcel_id']?></b> have been Approved On <b><?= $row['updated_at']?></b>  </span>
                                       <form method="POST" action="notification.php?appId=<?= $row['appId']?>">
                                        <button style="float: right;margin-left: 90px;">Payment</button>
                                        </form>
                                    </div>
                                    <div>
                                        <i class="ti-angle-right"></i>
                                    </div>
                                </a>
                            <?php }else if($row['status']=='Paid'){?>
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between py-3">
                                    <div>
                                        <span><b>Congratulation</b> Your Payment to the Parcel Id <b><?= $row['parcel_id']?></b> have Successfully Done On <b><?= $row['updated_at']?></b>  </span>
                                    </div>
                                    <div>
                                        <i class="ti-angle-right"></i>
                                    </div>
                                </a>
                            <?php }else{?>
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between py-3">
                                    <div>
                                        <span><b>Sorry</b>  Your Application to the Parcel Id <b><?= $row['parcel_id']?></b> have been Rejected  On Date <b><?= $row['updated_at']?></b> </span>
                                    </div>
                                    <div>
                                        <i class="ti-angle-right"></i>
                                    </div>
                                </a>
                        <?php }}}else{?>
                            <?php
                                $query=mysqli_query($con,"SELECT * FROM claim WHERE person_id='$id' AND status ='Solved'");
                                while ($row=mysqli_fetch_array($query)) {
                                  
                                       
                                ?>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between py-3">
                                    <div>
                                        <span><b>Congratulation</b> Your Claim Solved Successfully On Date <b><?= $row['updated_at']?></b>  </span>
                                    </div>
                                    <div>
                                        <i class="ti-angle-right"></i>
                                    </div>
                                </a>
                        <?php }}?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 ps-xl-9 mt-5 mt-lg-0">
                        <?php
                        $appId=@$_GET['appId'];
                        if($appId != null){
                            ?>
                        <div class="card">
                        <div class="card-body p-4">
                        <h3 class="display-7 mb-4 text-center"> Payment</h3>
                        <?php
                        $query=mysqli_query($con,"SELECT propertyId,propertyName,amount,description,(SELECT email FROM person WHERE personId='$id' LIMIT 1) as email,(SELECT firstName FROM person WHERE personId='$id' LIMIT 1) as firstName FROM property WHERE application_id='$appId'");
                        while ($row=mysqli_fetch_array($query)) {
                            
                        ?>
                        <form method="post" action="pay.php">                 
                    <div class="form-group">
                        <input id="property-name" type="text" name="propertyName" value="<?=$row['propertyName']?>" data-constraints="@Required" class="form-control" style="background-color: white;" readOnly>
                        <input id="email" type="hidden" name="email" value="<?=$row['email']?>" data-constraints="@Required" class="form-control" style="background-color: white;" readOnly>
                        <input id="firstName" type="hidden" name="firstName" value="<?=$row['firstName']?>" data-constraints="@Required" class="form-control" style="background-color: white;" readOnly>
                        <input id="appId" type="hidden" name="appId" value="<?=$appId?>" data-constraints="@Required" class="form-control" style="background-color: white;" readOnly>
                    </div>
                    <div class="form-group">
                        <input id="amount" type="number" name="amount" value="<?=$row['amount']?>" data-constraints="@Required" class="form-control" style="background-color: white;" readOnly>
                    </div>
                    <div class="form-group">
                    <textarea class="form-control" id="description" name="description" rows="4" style="background-color: white;" readOnly><?=$row['description']?></textarea>
                </div>                    
                    <input type="submit" class="btn btn-primary w-100" value="Pay" name="pay">
                    </form>
                <?php }?>
                </div>
            </div>
        <?php }?>
                    </div>
                </div>
            </div>
        </section>
       
        <section class="section bg-gray-100">
            <div class="container">
                <div class="row justify-content-center section-heading">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h3 class="display-6 mb-4 font-w-300">We Provide Best <span class="font-w-700">Services Policy</span>.</h3>
                        <span class="divider h-3px bg-primary w-60px mx-auto mb-4"></span>
                        
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card position-relative hover-top theme-hover-bg">
                            <div class="card-body text-center px-xl-6 py-6">
                                <div class="icon icon-primary icon-xl rounded-circle mb-4 border-white border-2 border">
                                    <i class="bi bi-map"></i>
                                </div>
                                <h5><a class="stretched-link text-reset" href="#">Plot survey</a></h5>
                                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card position-relative hover-top theme-hover-bg">
                            <div class="card-body text-center px-xl-6 py-6">
                                <div class="icon icon-primary icon-xl rounded-circle mb-4 border-white border-2 border">
                                    <i class="bi bi-house"></i>
                                </div>
                                <h5><a class="stretched-link text-reset" href="#">Well Paid</a></h5>
                                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card position-relative hover-top theme-hover-bg">
                            <div class="card-body text-center px-xl-6 py-6">
                                <div class="icon icon-primary icon-xl rounded-circle mb-4 border-white border-2 border">
                                    <i class="bi bi-person"></i>
                                </div>
                                <h5><a class="stretched-link text-reset" href="#">Easy Claiming</a></h5>
                                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
    </main>
    <!-- End Main -->
    <!-- Footer -->
    <?php include('footer.php')?>