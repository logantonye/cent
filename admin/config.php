

<?php
if($_SERVER['SERVER_NAME']=="localhost" || $_SERVER['SERVER_NAME']=="127.0.0.1" || $_SERVER['SERVER_NAME']=="192.168.121.16" ){
    $host="localhost";
    $username="sql_centenialtra";
    $password="Pxx58wmrjA8yrSaM";
    $dbname="sql_centenialtra"; 
}
else if($_SERVER['SERVER_NAME']=="0.0.0.0"){
    $host="127.0.0.1";
    $username="centenia_trade";
    $password="WHATTHEFUCKMAN";
    $dbname="centenia_trade";
}
else{
    $host="localhost";
    $username="sql_centenialtra";
    $password="Pxx58wmrjA8yrSaM";
    $dbname="sql_centenialtra";
}

$sitename="Centenial Trade";
$admin_email="support@centenialtrade.com";

$conn=mysqli_connect($host,$username,$password,$dbname);

if(!$conn){
    $response = array(
        "error" => "yes",
        "errorMsg" => "Invalid db details"
    );

    echo json_encode($response);
}


?>