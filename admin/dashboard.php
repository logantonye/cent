<?php
session_start();
require "../config.php";
require "variables.php";
if(!isset($_SESSION['id'])){
    header("location:index.php");
}
else{
    $admin_name=$_SESSION['admin_name'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $sitename; ?> - Control panel</title>
<link rel="icon" type="image/x-icon" href="../css/images/favicon.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" href="../alertifyjs/css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css" />
<script src="../alertifyjs/alertify.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $sitename; ?> admin <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item  active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>User management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Users:</h6>
                        <a class="collapse-item" href="register.php">Add users</a>
                         <a class="collapse-item" href="edit-users.php">Manage Clients</a>
                         <a class="collapse-item" href="kyc.php">Review KYC</a>
                         <a class="collapse-item" href="edit-portifolios.php">Manage Portfolios</a>
						<a class="collapse-item" href="newsletter.php">Promotional emails</a>
						<a class="collapse-item" href="messages.php">Messages</a>
						
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Settings</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Admin settings:</h6>
                        <a class="collapse-item" href="change-password.php">Change password</a>
                        <a class="collapse-item" href="change-username.php">Change username</a>
                        <a class="collapse-item" href="change-email.php">Login email</a>
                        <a class="collapse-item" href="site-info.php">Site info</a>
                        <a class="collapse-item" href="plans.php">Investment Plans</a>
                        <a class="collapse-item" href="payments.php">Payment methods</a>
                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Charts -->
           

            <!-- Nav Item - Clients -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Clients</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        
                        <!-- Nav Item - Alerts -->
                        

                        <!-- Nav Item - Messages -->
                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $admin_name ;?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Deposits</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $total_deposited; ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_users;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Unverified users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $unverified_num; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-lock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Suspended users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $suspended_num; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-times fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                       
                        <!-- Pie Chart -->
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Goals</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Clients added <span
                                            class="float-right"><?php echo $total_users."/10";  ?></span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo ($total_users/10)*100; ?>%;"
                                            aria-valuenow="<?php echo ($total_users/10)*100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Active clients <span
                                            class="float-right"><?php echo $active_clients_num."/10";  ?></span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo ($active_clients_num/10)*100; ?>%;"
                                            aria-valuenow="<?php echo ($active_clients_num/10)*100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Deposits <span
                                            class="float-right"><?php echo $deposits."/100000";  ?></span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo ($deposits/100000)*100; ?>%;"
                                            aria-valuenow="<?php echo ($deposits/100000)*100; ?>" aria-valuemin="0" aria-valuemax="100000"></div>
                                    </div>
                                   
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Color System -->

                            <div class="row">
                            

                            </div>

                        </div>
                        <div class="col-lg-6 mb-4">
                          <div class="card shadow mb-4">
                            <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">
                              Pending Deposits
                            </h6>
                            </div>
                          
                          <div class="card-body"
                       >
                            <div class="table-responsive">
                                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <thead>

                                    <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Amount</th>
                                            <th>Method</th>
                                            <th>Approve</th>
                                            <th>Decline</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Amount</th>
                                            <th>Method</th>
                                            <th>Approve</th>
                                            <th>Decline</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $accounts_query=mysqli_query($conn,"SELECT * FROM `transactions` WHERE `status` = 'pending' AND `type`='deposit' ORDER BY `id` DESC");
                                        if(mysqli_num_rows($accounts_query)>0){
                                            while($row=mysqli_fetch_assoc($accounts_query)){ 
                                                $amount=$row['amount'];
                                             
                                                $user_id=$row['user_id'];
                                                $trx_id = $row['id'];
                                                $method= $row['currency'];
                                                $firstday=$row['unix_time'];
                                                
                                                $today=time();
                                                $days=round(($today-intval($firstday))/86400,2) ;
                                                
                                                $query_currency=mysqli_query($conn, "SELECT * FROM payment_methods WHERE id='$method'");
                                                if(mysqli_num_rows($query_currency)>0){
                                                    $currency=mysqli_fetch_assoc($query_currency);
                                                    $currency_name=$currency['slug'];
                                                }
                                                else{
                                                    $currency_name="Bank";
                                                }

                                               

                                                $query_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`=$user_id");
if ($query_user) {
    $user = mysqli_fetch_assoc($query_user);
    if ($user) {
        $username = $user['username'];
        $name = $user['name'];
        $email = $user['email'];
    } else {
        $username = $name = $email = 'Unknown';
    }
} else {
    echo "Database query failed: " . mysqli_error($conn);
}

                                                 $amount=floatval($amount);
                                                 
                                                 
                                                echo "
                                                <tr >
                                                
                                                <td>$name</td>
                                                <td>$email</td>
                                                <td>$$amount </td>
                                                <td>$currency_name</td>
                                                <td>
                                                <button class='btn edit-btn' value='$trx_id' onclick='approve(this.value)'>
                                                <i class='fas fa-user-edit'></i>
                                                </button> 
                                                <button id='hiddenEditbtn' class='btn d-none' data-toggle='modal' data-target='#editUserModal'></button>
                                                </td>
                                                <td>
                                                <button class='btn border btn-light' value='$trx_id' onclick='openDecline(this.value)'>
                                                <i class=''>&times;</i>
                                                </button> 
                                                </td>
                                                
                                                ";
                                                 echo"
                                                
                                               
                                            </tr>
                                                ";
                                            }
                                        }
                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                          </div>
                          </div>


                        <div class="col-lg-6 mb-4">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pending Withdrawals</h6>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Approve</th>
                <th>Decline</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Balance</th>
                <th>Status</th>
                <th>Approve</th>
                <th>Decline</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $accounts_query=mysqli_query($conn,"SELECT * FROM `transactions` WHERE `status`='pending' AND `type`='withdrawal'  ORDER BY `id` DESC");
            if(mysqli_num_rows($accounts_query)>0){
                while($row=mysqli_fetch_assoc($accounts_query)){
                    
                    
                    $amount=$row['amount'];
                    $status=$row['status'];
                    $user_id=$row['user_id'];
                    $trx_id=$row['id'];
                    $query_name=mysqli_query($conn,"SELECT * FROM `users` WHERE id='$user_id'");
                    if(mysqli_num_rows($query_name)>0){
                        $row2=mysqli_fetch_assoc($query_name);
                        $username=$row2['username'];
                        
                        $email=$row2['email'];
                        
                     }
                    echo "
                    <tr>
                    <td>$username</td>
                    <td>$email</td>
                    
                    <td>$$amount </td>
                    <td>$status</td>
                    <td>
                    
                    <button type='button' class='btn btn-primary' value='$trx_id' onclick='gettrx(this.value)'>
                        Approve
                    </button>
                    
                    </td>
                    <td>
                  <button class='btn border btn-light' value='$trx_id' onclick='openDecline(this.value)'>
                                                <i class=''>&times;</i>
                                                </button> 
                                                </td>
                    
                </tr>
                    ";
                }
            }
            
            ?>
            <button type='button' class='btn btn-primary d-none' data-toggle='modal' data-target='#approveModal' value='$trx_id' id='trx-modal-btn'>
                        modal
                    </button>
        </tbody>
    </table>
</div>
    </div>
   
</div>

</div>


<!------------------------------------------------------------------------------------------>



<div class="col-lg-6 mb-4">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Active Portfolios</h6>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Portfolio name</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Portfolio name</th>
                
                
            </tr>
        </tfoot>
        <tbody>
            <?php
            $accounts_query=mysqli_query($conn,"SELECT * FROM `portifolios` WHERE `status`='active'   ORDER BY `id` DESC");
            if(mysqli_num_rows($accounts_query)>0){
                while($row=mysqli_fetch_assoc($accounts_query)){
                    
                    
                    $amount=$row['amount'];
                    
                    $user_id=$row['user_id'];
                    $portifolioName = $row['name'];
                   
                    $query_name=mysqli_query($conn,"SELECT * FROM `users` WHERE id='$user_id'");
                    if(mysqli_num_rows($query_name)>0){
                        $row2=mysqli_fetch_assoc($query_name);
                        $username=$row2['username'];
                        
                        $email=$row2['email'];
                        
                     }
                    echo "
                    <tr>
                    <td>$username</td>
                    <td>$email</td>
                    <td>$portifolioName</td>
                    
                    
                    
                   
                    
                </tr>
                    ";
                }
            }
            
            ?>
            
        </tbody>
    </table>
</div>
    </div>
   
</div>

</div>










                        <div class="col-lg-6 mb-4">




                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                           
                                <div class="card-body">
                                <div class="table-responsive">
              
                            </div>
                                </div>
                            </div>
                                </div>

                            <!-- Approach -->
                            <div class="col-lg-6 mb-4">

                                </div>
                                
                               
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <?php echo $sitename; ?> <?php echo Date("Y");  ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php?logout=true">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter transaction hash</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="hash-form">
                    <input type="hidden" id="trx-id" readonly/>
                    <div class="form-group">
                    <label>Hash</label>
                    <input type="text" id="hash" class="form-control" placeholder="Enter transaction hash">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block" onclick="openApprove()">Approve transaction</button>
                    </div>
                </div>
                </form>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="Edit users modal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Portfolio</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    

                <form class="user" method="post" id="user-form">
                    <input type="hidden" name="user_id" id="user_id"/>
                                <div class="form-group row">
                                <label>Select a portfolio to edit: </label>
                                    <select class="form-control" name="portifolioName" id="portifolioName" onchange="changeBalance(this.value)" required>
                                        
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                <label>Balance (BTC): </label>
                                    <input type="number" class="form-control form-control-user" id="portifolioBalance"
                                        placeholder="Portifolio balance" name="portifolioBalance">
                                </div>
                                
                                <div class="form-group">
                                <label>Profit (BTC): </label>
                                    <input type="number" class="form-control form-control-user" id="portifolioProfit"
                                        placeholder="Portifolio profit" name="portifolioProfit">
                                </div>



                                
                               
                                
                               
                                
                                <div class="form-group">
                                <label>Active: </label>
                                
                                
                                    <select name="active" class="form-control" id="select-box">
                                     
                                     <option  value="active" id="active-yes">Yes </option>       
                                    <option  value="null" id="active-no">No </option>
                                    </select>
                                </div>

                                <button type="button" name="edit" class="btn btn-primary btn-user btn-block" id="user-submit" onclick="submit_form()">
                                    Edit client account
                                </button>
                                <hr>
                                
                                 
                            </form>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>



    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script>
        function openApprove(){
            var formData=$("#hash-form").serialize();
            var trx_id=$("#trx-id").val();
            var hash=$("#hash").val();
            $.ajax({
                type:'post',
                url: 'ajax/approve.php',
                data:{'trx_id': trx_id, 'hash':hash},
                success: function(data){
                    swal("Great!",data, "success");
                }
            })
        }
        
        function approve(id){
            $.ajax({
                type: 'post',
                url: 'ajax/approve-deposit.php',
                data: {'trx_id': id},
                success: function(data){
                    swal("Great!",data, "success");
                }
            })
        }
        
        function gettrx(id){
             $.ajax({
                type:'post',
                url: 'ajax/trx.php',
                data:{'id':id},
                success: function(data){
                    $("#trx-id").val(data)
                    $("#trx-modal-btn").click()
                }
            })
        }
        
        function submit_form(){
    var myFormData=$("#user-form").serialize();
    disable_btn();
    $.ajax({
        'type':'post',
        'url':'ajax/edit-portifolios.php',
        'data':myFormData,
        'success':function(data){
            alertify.alert(data);
            enable_btn();
        }
    });
}

function disable_btn(){
   $("#user-submit").attr("disabled",true); 
   
}
function enable_btn(){
      $("#user-submit").attr("disabled",false); 
}
function changeBalance(id){
    $.ajax({
        type: 'post',
        url: 'ajax/get-balance.php',
        data: {'folioId': id},
        success: function(data){
            folioData=JSON.parse(data);
            console.log(folioData);
            $('#portifolioBalance').val(folioData.balance);
            $('#portifolioProfit').val(folioData.profit);
            var folioStatus = folioData.status;
            if(folioStatus=="active"){
                $("#active-no").attr("selected",false);
                $("#active-yes").attr("selected",true);
            }
            else{
                $("#active-yes").attr("selected",false);
                $("#active-no").attr("selected",true);
            }
        }
    })
}
function openModal(id){
        
        $.ajax({
            type:'post',
            url:'ajax/get-portifolio.php',
            data:{'user_id':id},
            success:function(data){
                //console.log(id,data);
                 
                var userdata=JSON.parse(data);
                console.log(userdata);
                
                $("#portifolioName").empty();
                userdata.map((data)=>{
                    
                    $("#portifolioName").prepend(data.options);
                    
                    
                });
                changeBalance($("#portifolioName").val());
                $("#user_id").val(id);
                //$("#portifolioBalance").val(data.portifolioBalance)
                //$("#inputEmail").val(userdata.options);

                //$("#lastName").val(userdata.name);
                //$("#inputEmail").val(userdata.email);
                //$("#inputNumber").val(userdata.phone);
                //$("#inputWallet").val(userdata.wallet);
                //$("#inputTotalInvestment").val(userdata.amount);
                //$("#inputBalance").val(parseInt(userdata.balance));
                //$("#inputPlan").val(userdata.plan);
                //$("#inputProfit").val(userdata.profit);
               
               
                
               if(userdata.active=="yes"){
                   $("#active-yes").attr("selected",true);
               }  
                  else{
                      $("#active-no").attr("selected",true);
                  }
               
                document.getElementById("hiddenEditbtn").click();
            }
        });
    }
    function openDecline(id){
        $.ajax({
           type: "post",
           url: "ajax/decline-trx.php",
           data: {'id': id},
           success: function(data){
               swal("Great", data, "success");
           }
        });
    }
    </script>

</body>

</html>