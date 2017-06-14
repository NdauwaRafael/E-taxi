<?php
include("../config/connection.php");
session_start();
if($_POST){
   $address = $_POST['address'];
   $plate = $_POST['car'];
   $customer = $_SESSION['customer_email'];

$check = "SELECT * FROM `request` WHERE `customer`='$customer' AND `status`='requested'";
$check_result = mysqli_query($con, $check);

if (mysqli_num_rows($check_result)>0) {
    echo '<div class="alert alert-warning" role="alert">You Have Another Pending Request. Clear first before Requesting againg</div>';
}else {


$request = "INSERT INTO `request`(`id`, `taxi`, `address`, `customer`) VALUES (NULL,'$plate','$address','$customer')";
if (mysqli_query($con, $request)) {
    echo "requested";
}else{
    echo '<div class="alert alert-danger" role="alert">An Error Occured we xcould not process your request at this time . Come back Later</div>'.mysqli_error($con);
}
}



}

?>