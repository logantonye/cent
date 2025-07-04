<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}
require "../config.php";
require "../mail.php";
require "variables.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $sitename; ?> - Change username</title>
<link rel="icon" type="image/x-icon" href="../css/images/favicon.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image">
                            <img src="../css/images/Realstockfx Coperate Mockup.jpg" width="100%" height="100%">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Change your username?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your new username and we'd handle the rest!</p>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputusername" aria-describedby="usernameHelp"
                                                placeholder="Enter New Username..." name="uname">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Change Username
                                        </button>
                                    </form>
                                    <hr>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



<?php
if ($_POST) {
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);

    if (!empty($uname)) {
        // Prepare the update query
        $stmt = $conn->prepare("UPDATE `users` SET `username` = ? WHERE `role` = 'admin'");
        $stmt->bind_param("s", $uname);

        if ($stmt->execute()) {
            $subject = "Admin Username reset";
            $message = "Your Username for Realstockfx has been changed.<br> Please contact the developer if you didn't initiate this change";
            
            sendmail($admin_email, $subject, $message);

            echo "<script> location.replace('index.php'); </script>";
        } else {
            echo "<script>swal('Error', 'Failed to update username: " . $stmt->error . "', 'error');</script>";
        }

        $stmt->close();
    }
}




?>







    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>