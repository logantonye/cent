
<?php
require "header.php";
?>


            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-spring">
                    <img src="assets/img/breadcrumb/br-shape-1.png" alt="Image" class="br-shape-one xs-none">
                    <img src="assets/img/breadcrumb/br-shape-2.png" alt="Image" class="br-shape-two xs-none">
                    <img src="assets/img/breadcrumb/br-shape-3.png" alt="Image" class="br-shape-three moveHorizontal sm-none">
                    <img src="assets/img/breadcrumb/br-shape-4.png" alt="Image" class="br-shape-four moveVertical sm-none">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-8 col-sm-8">
                                <div class="breadcrumb-title">
                                    <h2>Login</h2>
                                    <ul class="breadcrumb-menu list-style">
                                        <li><a href="index.php">Home </a></li>
                                         <li style="color:#fcb529;">Login</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4 col-sm-4 xs-none">
                                <div class="breadcrumb-img">
                                    <img src="assets/img/breadcrumb/br-shape-5.png" alt="Image" class="br-shape-five animationFramesTwo">
                                    <img src="assets/img/breadcrumb/br-shape-6.png" alt="Image" class="br-shape-six bounce">
                                    <img src="assets/img/breadcrumb/breadcrumb-3.png" alt="Image">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- Breadcrumb End -->

               <!-- Account Section start -->
               <section class="Login-wrap ptb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                            <div class="login-form-wrap">
                                <div class="login-header">
                                    <h3>Login Here</h3>
                                    <p>Welcome Back!! Login To Your Account</p>
                                </div>
                                <div class="login-form">
                                    <div class="login-body">
                                        <form class="form-wrap" action="" method="post">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input id="email" name="email" type="email"  placeholder="Username Or Email Address" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input id="pwd" name="password" type="password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                    <div class="checkbox style3">
                                                        <input type="checkbox" id="test_1">
                                                        <label for="test_1">
                                                            Remember Me
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end mb-20">
                                                    <a href="dashboard/forgot-password.php" class="link style1"style="color:#fcb529">Forgot Password?</a>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <button class="btn style1" style="background-color:#fcb529">
                                                            Login Now
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <p class="mb-0" >Don’t Have an Account? <a class="link style1" href="register.php" style="color:#fcb529">Create One</a></p>
                                                </div>
                                      
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Account Section end -->

            </div>
            <!-- Content Wrapper End -->

     <?php
     include "footer.php";
     ?>
     </div>
     
      
        <!-- Page Wrapper End -->
        
        <!-- Back-to-top button Start -->
        <a href="javascript:void(0)" class="back-to-top bounce" style="background:#fcb529;"><i class="ri-arrow-up-s-line"></i></a>
        <!-- Back-to-top button End -->

       <!-- Link of JS files -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/form-validator.min.js"></script>
        <script src="assets/js/contact-form-script.js"></script>
        <script src="assets/js/aos.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/odometer.min.js"></script>
        <script src="assets/js/fancybox.js"></script>
        <script src="assets/js/jquery.appear.js"></script>
        <script src="assets/js/tweenmax.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

</html>
<?php
if ($_POST) {
  $customerId = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $query = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$customerId' AND NOT `role`='admin'");
  if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
      $dbpass = $row['password'];
      $status = $row['status'];
      $role = $row['role'];
      $id = $row['id'];
      $fakename = $row['email'];
      if ($status == "verified" || $status == "active") {
          if (password_verify($password, $dbpass)) {
              $dateTime = date("l jS \of F Y h:i:s A");
              mysqli_query($conn, "UPDATE `users` SET `last_login`='$dateTime' WHERE `id`='$id'");
              $_SESSION['user_id'] = $id;
              $_SESSION['auth'] = true;
              $nextstep='dashboard/auth.php?id='.$id;
              
              
                 echo "
      <script>
      window.location.replace('$nextstep');
      </script>
      "; 

            //   header("Location: $nextstep");
          } else {
              echo "
              <script>
              swal('Oops', 'Invalid details', 'error')
              </script>
              ";
          }
      } elseif ($status == "not verified") {
          if ($role == 'admin') {
              echo "
              <script>
              swal('Oops', 'Invalid details', 'error')
              </script>
              ";
          } else {
              $path = "dashboard/otp.php";
              $nextstep = $path . '?user-email=' . $customerId;

              echo "
              <script>
              window.location.replace('$nextstep');
              </script>
              ";
          }
      } else {
          $_SESSION['user_id'] = $id;
          $path = "dashboard/index.php";
          $nextstep = $path;

          echo "
          <script>
          window.location.replace('$nextstep');
          </script>
          ";
      }
  } else {
      echo "
      <script>
      swal('Oops', 'Invalid details', 'error')
      </script>
      ";
  }
}
?>