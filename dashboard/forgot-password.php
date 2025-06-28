<?php
session_start();
require "../config.php";
require "../mail.php";


?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-asset-path="../asset/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Register</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../asset/img/favicon/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../asset/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../asset/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../asset/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../asset/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../asset/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../asset/vendor/js/helpers.js"></script>
    <!--sweet alerts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../asset/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl light-bg">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                   
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Centenial Trade</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Forgot your password?</h4>
              <p class="mb-4">Enter the email linked to your account</p>

              <form id="formAuthentication" class="mb-3"  method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    value=''
                    placeholder="Email address"
                    required
                  />
                </div>
               
                <button class="btn btn-primary d-grid w-100">Continue</button>
              </form>

              
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    

    <!-- Core JS -->
    <!-- build:js asset/vendor/js/core.js -->
    <script src="../asset/vendor/libs/jquery/jquery.js"></script>
    <script src="../asset/vendor/libs/popper/popper.js"></script>
    <script src="../asset/vendor/js/bootstrap.js"></script>
    <script src="../asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../asset/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../asset/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
<?php
if($_POST){
   
	$email=mysqli_real_escape_string($conn,$_POST['email']);
     $query=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
     if(mysqli_num_rows($query)>0){
         $row=mysqli_fetch_assoc($query);
         $dbemail=$row['email'];
         $otp=$row['otp'];
         $link="https://centenialtrade.com/dashboard/newpassword.php?id=$otp&email=$dbemail";
         $message=
         "<p>The password for your account has been reset. Please follow the link below to enter your new password</p>
         <p><a href='$link'><button style='border: 1px solid #fb414f; background-color: #fb414f; 
         color: #fff; text-decoration: none; font-size: 18px; padding: 10px 20px;'>Reset password</button></a></p>
         ";
         $subject="Password reset confirmation";

         $sendmail=sendmail($dbemail,$subject,$message);

         if(true){
            $display="none";
            echo"
            <script>
            swal('success','We have sent instructions to $dbemail on how to reset your password.','success')
            </script>
          ";
         }

     }
     else{
        echo "<script>
            swal('Sorry','This email is not linked to any account','warning')
            </script>";
     }
	
}
?>
<style>
              .layout-wrapper{
                background-color: black;
                color:white;
              }

              .card, .layout-navbar, #layout-menu{
                background-color: #000021 !important;
                color:white;
              }
              a.layout-menu-toggle{
                background: #00cb00 !important;
              }
              .text-primary{
                color: #00cb00 !important;
              }
              .btn-primary{
                background-color:#00cb00 !important;
                border: none;
              }
              .btn-outline-primary{
                border-color: #00cb00 !important;
                color: #00cb00 !important;
              }
              .btn-outline-primary:hover{
                background-color: #00cb00 !important;
                color: #fff !important;
              }
              .btn{
                box-shadow: none !important;
              }
              ul .dropdown-menu{
                background: #000021;
                color:#fff
              }
              a{
                color:#00cb00;
              }
              .light-bg{
                background-color: #000;
              }
            </style>