<?php
include("../config/connection.php");
session_start();


if($_POST){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $post = $_POST['post'];
    $id = $_POST['id'];

    $update = "UPDATE `police` SET `firstname`='$fname',`lastname`='$lname',`phone`='$phone',`post`='$post' WHERE `id`='$id'";
    if(mysqli_query($con,$update)){
        echo "Updated";
    }else{
        echo '<div class="alert alert-danger" role="alert">An Error Occurred Updating Police Details</div>';
    }
}


?>