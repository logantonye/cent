<?php
session_start();
require "config.php";
require "mail.php";


?>
<!DOCTYPE html>
<html lang="zxx" class="theme-dark"><head>

 
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Centenial Trade is one of the fastest growing online trading brands in the world. Voted the best mobile trading platform">  <!-- Link of CSS files -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/remixicon.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/odometer.min.css">
        <link rel="stylesheet" href="assets/css/fancybox.css">
        <link rel="stylesheet" href="assets/css/aos.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/dark-theme.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <title>Centenial Trade</title>
        <link rel="icon" type="image/png" href="./logo/favicon.png">
        
    </head>

    <body>

        <!--Preloader starts-->
        <!-- <div class="loader js-preloader">
   <section><img src="assets/img/loading.gif"/></section>
        </div> -->
        <!--Preloader ends-->

        <!-- Theme Switcher Start -->
        <div class="switch-theme-mode">
            <label id="switch" class="switch">
                    <input type="checkbox" onchange="toggleTheme()" id="slider">
                    <span class="slider round"></span>
            </label>
        </div>
        <!-- Theme Switcher End -->

        <!-- Page Wrapper End -->
        <div class="page-wrapper">
        
          <!-- Header Section Start -->
            <header class="header-wrap style1">
                <div class="header-top">
                    <button type="button" class="close-sidebar">
                        <i class="ri-close-fill"></i>
                    </button>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-12">
                                <div class="header-top-left">
                                   <ul class="contact-info list-style">
                                       <li><i class="flaticon-call"></i> <a href="tel:02459271449">(+024) 592 71 449</a></li>
                                       <li><i class="flaticon-email-1"></i> <a href="mailto:support@centenialtrade.com">support@centenialtrade.com</a></li>
                                       <li><i class="flaticon-pin"></i><p>St. Here Mandalay, New York, U.S.A</p></li>
                                   </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="header-top-right">
                                    <ul class="header-top-menu list-style">
                                        <li><a href="contact.php">Support</a></li>
                                        <li><a href="contact.php">Help</a></li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="container">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <a class="navbar-brand" href="index.php">
                                <img class="logo-light" src="./logo/1.png" style="width: 150px;" alt="logo">
                                <img class="logo-dark" src="./logo/2.png" style="width: 150px;" alt="logo">
                            </a>
                            <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                                <div class="menu-close xl-none">
                                    <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                                </div>
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="index.php" class="nav-link active">
                                            Home
                                            
                                        </a>
                                 </li>
                                   
                                    <li class="nav-item">
                                        <a href="about.php" class="nav-link">
                                            About Us
                                        </a>
                                    </li>
                                   <li class="nav-item">
                                        <a href="service-details.php" class="nav-link">
                                           Services
                                          
                                        </a>
                                    </li>
                                   <li class="nav-item has-dropdown">
                                        <a href="#" class="nav-link">
                                            Pages
                                            <i class="ri-arrow-down-s-line"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            
                                            <li class="nav-item">
                                                <a href="team.php" class="nav-link">Our Team</a>
                                            </li>
                                           
                                            <li class="nav-item">
                                                <a href="testimonials.php" class="nav-link">Testimonials</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    User Pages
                                                    <i class="ri-arrow-down-s-line"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                   
                                                    <li class="nav-item">
                                                        <a href="login.php" class="nav-link">Login</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="register.php" class="nav-link">Register</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="recover-password.php" class="nav-link">Recover Password</a>
                                                    </li>
                                                </ul>
                                            </li>
                                          
                                            
                                        </ul>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="contact.php" class="nav-link">Contact Us</a>
                                    </li>
                                    <li class="nav-item xl-none" style="margin-left: 20px;" >
                                        <a href="register.php" class="btn style1" style="background-color:#fcb529;">Register Now</a>
                                    </li>
                                </ul>
                                <div class="others-options  lg-none" style="margin-left: 20px;">
                                    
                                    <div class="header-btn lg-none">
                                        <a href="register.php" class="btn style1">Register Now</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <div class="mobile-bar-wrap">
                            <div class="mobile-sidebar">
                                <i style="color:#fcb529;"class="ri-menu-4-line"></i>
                            </div>
                            <button class="searchbtn xl-none" type="button">
                                <i style="color:#fcb529;" class="flaticon-search"></i>
                            </button>
                            <div class="mobile-menu xl-none"background-color:transparent;">
                                <a href="javascript:void(0)"><i style="color:#fcb529; background-color:transparent;" class="ri-menu-line"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="search-area">
                        <div class="container">
                            <form action="#">
                                <div class="form-group">
                                    <input type="search" placeholder="Search Here" autofocus>
                                </div>
                            </form>
                            <button type="button" class="close-searchbox">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>  
            <!-- Header Section End -->