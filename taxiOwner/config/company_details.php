<?php
session_start();
include("../../config/connection.php");  

 $company_details = "SELECT * FROM `company` WHERE `owner`='{$_SESSION['owner_email']}'";
 $comapany_res = mysqli_query($con, $company_details);

 while ($comp = mysqli_fetch_array($comapany_res)) {
     $comapany_id = $comp['id'];
     $company_name=$comp['name'];
     $company_location = $comp['location'];
     $company_description = $comp['description'];
 }
?>