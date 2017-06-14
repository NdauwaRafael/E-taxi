<?php
session_start();
include("../../config/connection.php");   
   if ($_POST) {
       $plate = $_POST['plate'];
       $route = $_POST['route'];
       $description = $_POST['description'];
       $company = $_POST['company'];
       $owner = $_SESSION['owner_email'];
     

$check = "SELECT * FROM `taxi` WHERE `owner`='{$_SESSION['owner_email']}' AND `plate`='$plate'";
$check_result = mysqli_query($con, $check);
if(mysqli_num_rows($check_result)>0){
     echo '<div class="alert alert-warning" role="alert">The Car You Are Adding Alredy Exists. Plate Number <strong>'.$plate.'</strong> is Registered to Another Car </div>';
}else {



        $cab = "INSERT INTO `taxi`(`id`, `plate`, `route`, `company_id`, `taxi_description`, `owner`) VALUES (NULL,'$plate','$route', '$company','$description','$owner')";

        if(mysqli_query($con, $cab)){
            echo "added";
        }else{
            echo '<div class="alert alert-danger" role="alert">An Error Occured While Adding This Company. Please Review Your Details And Try Again</div>'.mysqli_error($con);
        }
   }

}


   
?>