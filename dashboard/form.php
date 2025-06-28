<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "../config.php";
require "../mail.php";


?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../asset/"
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
    <link rel="shortcut icon" href="logo/favicon.ico" type="image/x-icon">

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
              <h4 class="mb-2">Tell us more about yourself</h4>
              <p class="mb-4">Make your trading journey easy and fun!</p>

              <form id="formAuthentication" class="mb-3"  method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Full name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="fullname"
                    value=''
                    placeholder="Full name"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required/>
                </div>

                <div class="mb-3">
                  <label for="organisation" class="form-label">Employment status</label>
                  
                  <select name="organisation" class="form-control" required placeholder="Employment status">
                      <option value="" hidden selected disabled>Employment status</option>
                      <option value="Employed">Employed</option>
                      <option value="Unemployed">Unemployed</option>
                      <option value="Self employed">Self employed</option>
                      <option value="Retired">Retired</option>
                      
                  </select>
                </div>
                <div class="mb-3">
                  <label for="position" class="form-label">Job title</label>
                  <input type="text" class="form-control" id="position" name="position" placeholder="Which position in your organisation do you operate?" required/>
                </div>
                <div class="mb-3">
                  <label for="salary" class="form-label">Annual income</label>
                  <select name="salary" class="form-control">
                      <option value="$10,000 - $99,000">$10,000 - $99,000</option>
                      <option value="$100,000 - $499,000">$100,000 - $499,000</option>
                      <option value="$500,000 and above">$500,000 and above</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="currency" class="form-label">Currency</label>
                  <select name="currency" class="form-control">
                      <option value="USD">American Dollar</option>
                      <option value="EUR">Euro</option>
                      <option value="GBP">Pound Sterling</option>
                  </select>
                </div>
                

                <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone number" required/>
                </div>

                <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="Where are you currently based?" required />
                </div>

                <div class="mb-3">
                  <label for="address" class="form-label">Contact address</label>
                  <textarea class="form-control" id="address" name="address" placeholder="Address" required></textarea>
                </div>

                <div class="mb-3">
                  <label for="zip" class="form-label">Zip code</label>
                  <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip code" required/>
                  

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
if ($_POST) {
    $id = $_SESSION['user_id'];
    $email = $_SESSION['email'];

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $organisation = mysqli_real_escape_string($conn, $_POST['organisation']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $currency = mysqli_real_escape_string($conn, $_POST['currency']);

    // Prepared statement for user update
    $update_stmt = $conn->prepare("UPDATE users SET `username`=?, `name`=?, `phone`=?, `zip_code`=?, `address`=?, `organisation`=?, `city`=?, `salary`=?, `position`=?, `currency`=? WHERE id=?");
    $update_stmt->bind_param("ssssssssssi", $username, $fullname, $phone, $zip, $address, $organisation, $city, $salary, $position, $currency, $id);
    $update_success = $update_stmt->execute();
    $update_stmt->close();

    if ($update_success) {
        $_SESSION['user_id'] = $id;

        // Insert portfolio using prepared statement
        $date = date("l jS \of F Y");
        $unix_time = time();
        $portfolio_name = "Wallet";
        $description = "Original portfolio";
        $amount = 0;
        $rate = "";
        $save_pro = "no";
        $ticker = "BTC-USD";
        $type = "wallet";

        $insert_stmt = $conn->prepare("INSERT INTO portifolios (`user_id`, `name`, `description`, `amount`, `rate`, `save_pro`, `date`, `unix_time`, `ticker`, `type`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_stmt->bind_param("issdssssss", $id, $portfolio_name, $description, $amount, $rate, $save_pro, $date, $unix_time, $ticker, $type);
        $insert_stmt->execute();
        $insert_stmt->close();

        $subject = "Account created successfully";
        $message = "Your account at Centenial Trade has successfully been created. You can now trade financial assets at the best rates.";
        sendmail($email, $subject, $message);

        echo "<script>window.location.replace('auth.php');</script>";
    } else {
        echo mysqli_error($conn);
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