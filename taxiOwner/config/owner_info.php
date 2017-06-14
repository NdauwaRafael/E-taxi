<?php
include("../config/connection.php");
include('../config/session.php');

if (isset($_SESSION['owner_email']) && !empty($_SESSION['owner_email'])) {
	$custEmail = $_SESSION['owner_email'];

	$query = "SELECT * FROM `taxiowner` WHERE `email`='$custEmail' ";
    $result = mysqli_query($con, $query);
/*Data is fetched in a result which is then converted to an array called customer*/

    while ($customer=mysqli_fetch_array($result)) {
    	$ownerFname = $customer['firstname'];
    	$ownerLname = $customer['lastname'];
          $ownerEmail = $customer['email'];
          $ownerPhone = $customer['phone'];
          $ownerGender = $customer['gender'];
    }
}


?>