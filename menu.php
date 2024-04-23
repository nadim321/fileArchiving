<?php
// checked if user is logged in or not
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["isLoggedIn"])) {
    if ($_SESSION["isLoggedIn"] != true) {
        header("location: login.php");
    }else{
        $loggedInUser = $_SESSION["username"];
        $loggedInUserRole = $_SESSION["role"];
    }

} else {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Thesis Archiving System</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>

    <body>
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img style="height:80px;width:80px"  src="image/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="thesis_list.php" class="active">Home</a></li>
                            <?php 
                            if($loggedInUserRole=="admin"){ ?>
                                <li class="submenu">
                                <a href="javascript:;">User</a>
                                <ul>
                                    <li><a href="user_list.php">List</a></li>
                                    <li><a href="user_add.php">Add</a></li>
                                </ul>
                                </li>
                            <?php } ?>
                            
                            <?php 
                            if($loggedInUserRole=="admin"){ ?>
                                <li class="submenu">
                                <a href="javascript:;">Teacher</a>
                                <ul>
                                    <li><a href="teacher_list.php">List</a></li>
                                    <li><a href="teacher_add.php">Add</a></li>
                                </ul>
                                </li>
                            <?php } ?>

                            <li class="scroll-to-section"><a href="thesis_add.php">Doc Upload</a></li>
                            <?php 
                            if($loggedInUserRole=="admin"){ ?>
                            <li class="scroll-to-section"><a href="thesis_upload_request.php">Upload request</a></li>
                            <?php } ?>
                            <li style="float: right"><a href="logout.php">Logout</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="main-banner" id="top">
        <div class="container-fluid">