<?php
session_start();
include("../config/connection.php");

if ($_POST) {
 $email = $_POST['email'];
 $password = $_POST['password'];

/*Select from database table customers where username and password matches the submitted details from login form*/
 $log="SELECT * FROM `police` WHERE `email`='$email' AND `password`='$password' ";
 $re = mysqli_query($con, $log);
 if (mysqli_num_rows($re)==1) {
    $_SESSION['police_email'] = $email;
    echo "success";

 }else{
  echo "invalid login details";
 }
}

    ?>