<?php
require "variables.php";
require "api.php";
require "../mail.php";
require "names.php";
?>
<!DOCTYPE html>


<html
  lang="en"
  class="light-style layout-menu-fixed"
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

    <title>Centenial Trade | Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="../logo/favicon.ico" type="image/x-icon">

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

    <!-- Helpers -->
    <script src="../asset/vendor/js/helpers.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    
    

  </head>

  <body>
      <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style>
    .goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
body {
    top: 0px !important; 
    }
#google_translate_element{
        position:fixed;
        bottom:10px;
        left:10px;
        z-index:1000;
    }
    
</style>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="../logo/2.png" style="width:200px; height:50px; display:inline"/>
                <b class='text-secondary' style='font-size:19px; display:inline'></b></span></a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="assets.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Analytics">Assets</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="stocks.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-line-chart"></i>
                <div data-i18n="Analytics">Stocks</div>
              </a>
            </li>
           
            <li class="menu-item">
              <a href="chart.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
                <div data-i18n="Analytics">Chart</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="portifolios.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Analytics">Portfolios</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="activities.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-detail'></i>
                <div data-i18n="Analytics">Activities</div>
              </a>
            </li>
            
            <li class="menu-item">
              <a href="fund.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-money'></i>
                <div data-i18n="Analytics">Fund Wallet</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="wallet-withdraw.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-receipt'></i>
                <div data-i18n="Analytics">Place withdrawal</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="bots.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-bot'></i>
                <div data-i18n="Analytics">Trading bots</div>
              </a>
            </li>
            

            <!-- Layouts -->
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Layouts">Transactions</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="deposits.php" class="menu-link">
                    <div data-i18n="Without menu">Deposits</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="withdrawals.php" class="menu-link">
                    <div data-i18n="Without navbar">Withdrawals</div>
                  </a>
                </li> 
              </ul>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="profile.php" class="menu-link">
                    <div data-i18n="Account">Profile</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="auth.php?logout=true" class="menu-link">
              <i class='bx bx-lock menu-icon tf-icons'></i>
                <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
            <br><br><br>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center "
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <b>Welcome, <?php echo $username; ?></b>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
               

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?php echo $image; ?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?php echo $image; ?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $username; ?></span>
                            <small class="text-muted"><?php echo $ver_status;?> </small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="create-portifolio.php">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Create Portfolio</span>
                      </a>
                    </li>
                    
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth.php?logout=true">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">
                <!-- Layout Demo -->
              
            <!-- / Content -->
            <style>
              .layout-wrapper{
                background-color: black;
                color:white;
              }

              .card, .layout-navbar, #layout-menu, .footer{
                background-color: #333 !important;
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
            </style>