<?php
include("../config/connection.php");

if($_POST){
    $id = $_POST['id'];
    $account = $_POST['account'];

  $delete = "DELETE FROM `$account` WHERE `id` = '$id'";  

    if(mysqli_query($con, $delete)){
        echo 'User Account Deleted Successfully';
    }else{
        echo 'An Error Occurred trying to delete this account. Try again later.';
    }
}

?>