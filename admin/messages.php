<?php
session_start();
require "../config.php";
require "variables.php";
require "../mail.php";
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
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <title><?php echo $sitename; ?> - Edit users</title>
<link rel="icon" type="image/x-icon" href="../css/images/favicon.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                <div class="sidebar-brand-text mx-3">Realstockfx admin <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
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
            <li class="nav-item  active">
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
                
                    <!-- Sidebar Toggle (Topbar) -->
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
                <h1 class="h3 mb-2 text-gray-800">Edit Clients</h1>
                    <!-- Page Heading -->
                    
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tables </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                             <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php
                                       
                                       $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `role`='subscriber'");
                                       if(mysqli_num_rows($query)>0){
                                           while($row=mysqli_fetch_assoc($query)){
                                               $name=$row['username'];
                                               $email=$row['email'];
                                               echo"
                                               <tr>
                                               <td>$name</td>
                                               <td>$email</td>
                                               <td>
                                               <button class='btn border' value='$email' onclick='openModal(this.value)'>
                                               <i class='fas fa-pen-fancy text-dark'></i>
                                               </button>
                                               <button data-target='#messageModal' data-toggle='modal' class='d-none' id='togglemodal'></button>
                                               </td>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Realstockfx <?php echo Date("Y");  ?></span>
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

    <!--
        Message modal
    -->

    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Write a message  </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <form method="post" onsubmit="filltext()">
                    <div class="form-group">
                                     <label for="header-input">
                                         Email address
                                     </label>
                                     <input type="email" name="email" class="form-control" id="email-input" placeholder="Write email here" readonly>
                    </div>
                    <div class="form-group">
                                     <label for="header-input">
                                         Write Email Subject
                                     </label>
                                     <input type="text" name="subject" class="form-control" id="header-input" placeholder="Write subject here">
                                 </div>
                                 <div class="form-group">
                                 <label for="message-input">
                                         Write message
                                     </label>
                                     <textarea name="message" id="comment" style="display:none"></textarea>
                                     <div id="editor-container" style="height:450px;"></div>
                                 </div>
                                 <div class="form-group">
                                 
                                     <center>

                                         <button type="submit" name="send-email" class="btn btn-primary">
                                             Send&nbsp;<i class="fas fa-arrow-right"></i>
                                         </button>
                                     </center>
                                 </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>


     









<!-- Block modal-->

  


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
   <!-- <script src="js/demo/datatables-demo.js"></script>-->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
     
<script>
var quill = new Quill('#editor-container', {
  modules: {
    toolbar: true
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'  // or 'bubble'
});
function filltext(){
$("#comment").val(quill.container.firstChild.innerHTML);
}
    function openModal(id){
        $("#email-input").val(id);
        $("#togglemodal").click();
         
    }
     
</script>
<?php
if($_POST){
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $email=$_POST['email'];
    $sendmail=sendmail($email,$subject,$message);
    if($sendmail){

        echo"
        
        <div class='col-lg-6 mb-4' id='danger-box'>
                                    <div class='card bg-danger text-white shadow fixed-bottom message-box'>
                                        <div class='card-body'>
                                            Error!
                                            <div class='text-white small'>An error occurred</div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                var message=document.getElementById('danger-box');
                                setTimeout(function(){
                                    message.style.display='none'
                                },3000);
                                </script>


        ";
    }
    else{
        echo"
        
        <div class='col-lg-6 mb-4' id='success-box'>
                                    <div class='card bg-danger text-white shadow fixed-bottom message-box'>
                                        <div class='card-body'>
                                            Success
                                            <div class='text-white small'>Emails sent successfully</div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                var message=document.getElementById('success-box');
                                setTimeout(function(){
                                    message.style.display='none'
                                },3000);
                                </script>


        ";
    }
}
?>
</body>

</html>