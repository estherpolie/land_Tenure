<?php 
session_start();
if($_SESSION["personId"]==""){
header("location:login.php");
}
$id=$_SESSION["personId"];
$title=$_SESSION["userType"];
$username=$_SESSION["email"];
include('connection.php');
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Land tenure</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- CSS Template -->
    <link href="static/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Skippy -->
    <a id="skippy" class="sr-only sr-only-focusable u-skippy" href="#content">
        <div class="container">
            <span class="u-skiplink-text">Skip to main content</span>
        </div>
    </a>
    <div id="loading" class="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <header class="header-main header-dark header-option-1 shadow-lg">
        <nav class="navbar navbar-expand-lg navbar-dark py-0 bg-primary z-index-1">
            <div class="container">
                <!-- Menu -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="home.php" class="nav-link">Home</a>
                        </li>
                        <?php 
                        if($title=='User'){?>
                            <li class="nav-item">
                            <a href="task.php" class="nav-link">Tasks</a>
                        </li>
                    <?php }?>
                        <?php 
                        if($title=='Investor'){
                            ?>
                        <li class="nav-item">
                            <a href="application.php" class="nav-link">Application</a>
                        </li>
                        
                        <?php
                    }
                    ?>

                    <?php 
                        if($title=='Holder'){
                            ?>
                        <li class="nav-item">
                            <a href="property.php" class="nav-link">My Property</a>
                        </li>
                        <li class="nav-item">
                            <a href="claim.php" class="nav-link">Make Claim</a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php 
                        if($title!='User'){
                            ?>
                            <li class="nav-item">
                            <a href="notification.php" class="nav-link">Notification</a>
                        </li>
                        <?php }?>
                   
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                    <div class="wt-userlogedin" style="display: flex; justify-content: space-between; align-items: center">
                        <ul class="navbar-nav me-auto">
                        <li class="dropdown nav-item">

                            <a href="#" class="nav-link">Setting</a>
                            <label class="px-dropdown-toggle mob-menu"></label>
                            <ul class="dropdown-menu left list-unstyled">
                                <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                               
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    </div>
                </div>
                <!-- End Menu -->
                
            </div>
        </nav>
    </header>