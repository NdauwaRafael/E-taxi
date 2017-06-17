<?php
@session_start();
@include("../config/connection.php");  
@include("../../config/connection.php"); 
  $select_a_taxi ="SELECT * FROM `taxi` WHERE `plate` IN (SELECT `taxi_plate` FROM `drivers` WHERE `email`='{$_SESSION['driver_email']}')";


$taxi_result = mysqli_query($con, $select_a_taxi);

while ($taxiS = mysqli_fetch_array($taxi_result)) {
    $plate = $taxiS['plate'];
    $route = $taxiS['route'];
    $description = $taxiS['taxi_description'];
}

?>


