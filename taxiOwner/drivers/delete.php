<?php
include("../../config/connection.php");
if($_POST){
    $delete = "DELETE FROM `drivers` WHERE `id`='{$_POST['id']}'";
    if(mysqli_query($con, $delete)){
        echo "deleted";
    }else{
        echo "Unable To Delete Driver".mysqli_error($con);
    }
}
?>