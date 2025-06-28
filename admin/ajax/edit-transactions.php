
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "../../config.php";

$trx_id = $_POST['trx-id'];
$description = $_POST['description'];
$date = $_POST['date'];
$amount=$_POST['amount'];

$update=mysqli_query($conn, "UPDATE `user_activities` SET `description` = '$description', `date`='$date', `amount`='$amount' WHERE `id` = '$trx_id'");
if($update){
    $response = array(
    "success"=> "yes"
    );
}

    
    echo json_encode($response);