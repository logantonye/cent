<?php
include "header.php";
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
                                    <h2>Register</h2>
                                    <ul class="breadcrumb-menu list-style">
                                        <li><a href="index.php">Home </a></li>
                                        <li style="color:#fcb529;">Register</li>
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
                    <div class="row ">
                        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                            <div class="login-form-wrap">
                                <div class="login-header">
                                    <h3>Register New Account</h3>
                                    <p>Welcome!! Create A New Account</p>
                                </div>
                                <div class="login-form">
                                    <div class="login-body">
                                        <form class="form-wrap" action="#" method="post">
                                            <div class="row">
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input id="email" name="email" type="email" placeholder="Email"  required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input id="pwd" name="password"  type="password" placeholder="Password" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input id="pwd_2" name="cpassword"  placeholder="Confirm Password"  type="password" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-12 mb-20">
                                                    <div class="checkbox style3">
                                                        <input type="checkbox" id="test_1">
                                                        <label for="test_1">
                                                            I Agree with the <a class="link style1" href="#" style="color:#fcb529">Terms &amp; conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                             <button class="btn style1" style="background-color:#fcb529">
                                                            Register Now 
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <p class="mb-0">Have an Account? <a class="link style1"
                                                            href="login.php" style="color:#fcb529">Sign In</a></p>
                                                </div>
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
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if ($_POST) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if ($password == $cpassword) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $subject = "OTP Verification";

        // Generate OTP
        $comb = '1234567890';
        $pass = array();
        $combLen = strlen($comb) - 1;
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $combLen);
            $pass[] = $comb[$n];
        }
        $OTP = implode($pass);

        $message = "<p>Your one time password for <?php echo \$sitename; ?> Baronial Holdings is <b>$OTP</b></p>Do not share this OTP with anyone.";

        // Check if email exists
        $check_stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows == 0) {
            $ip = $_SERVER['REMOTE_ADDR'];

            // Insert user
            $insert_stmt = $conn->prepare("INSERT INTO users (`email`, `password`, `status`, `otp`, `ip_address`, `refer`, `ref_bonus`) VALUES (?, ?, 'verified', ?, ?, '0', '0')");
            $insert_stmt->bind_param("ssss", $email, $password, $OTP, $ip);
            $insert_stmt->execute();

            if ($insert_stmt->affected_rows > 0) {
                $getid_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
                $getid_stmt->bind_param("s", $email);
                $getid_stmt->execute();
                $getid_result = $getid_stmt->get_result();

                if ($getid_result->num_rows > 0) {
                    $row = $getid_result->fetch_assoc();
                    $id = $row['id'];
                    $date = date("Y-F-jS");

                    // Insert account
                    $acc_stmt = $conn->prepare("INSERT INTO accounts(`user_id`,`balance`,`active`,`amount`,`plan`,`created_at`) VALUES (?, '0', 'no', '0', '2', ?)");
                    $acc_stmt->bind_param("is", $id, $date);
                    $acc_stmt->execute();

                    // Insert referral
                    $ref_stmt = $conn->prepare("INSERT INTO referrals(`user_id`, `refer_by`, `join_at`) VALUES (?, '0', ?)");
                    $ref_stmt->bind_param("is", $id, $date);
                    $ref_stmt->execute();

                    if ($acc_stmt->affected_rows > 0) {
                        $_SESSION['user_id'] = $id;
                        $_SESSION['email'] = $email;
                        echo "<script>window.location.replace('dashboard/form.php');</script>";
                    } else {
                        echo "<script>swal('Oops','An error occurred','error');</script>";
                    }

                    $acc_stmt->close();
                    $ref_stmt->close();
                }

                $getid_stmt->close();
            } else {
                echo "<script>swal('Oops','Error storing user details','error');</script>";
            }

            $insert_stmt->close();
        } else {
            echo "<script>swal('Oops','Email already exists','error');</script>";
        }

        $check_stmt->close();

        // Send email with OTP
        sendmail($email, $subject, $message);

    } else {
        $response = array(
            "error" => "yes",
            "errorMsg" => "Passwords are not the same"
        );
        echo json_encode($response);
    }
}

?>

