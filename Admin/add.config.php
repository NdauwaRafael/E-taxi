<?php
include("../config/connection.php");
session_start();


if ($_POST) {
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $phone = $_POST['phone'];
   $gender = $_POST['gender'];
   $post = $_POST['post'];
   

/*Check Whether the registering user already exists Using This Email*/
$check = "SELECT * FROM `police` WHERE `email`='$email' ";
$check_result = mysqli_query($con, $check);
if(mysqli_num_rows($check_result)>0){
     echo '<div class="alert alert-danger" role="alert">Could Not Register As An E-Taxi Police User for A Police User With Email <strong>'.$email.'</strong> Already Exists</div>';
}else
{
            if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($phone) && !empty($gender)) {/*check whether fields are empty*/
                    /*string holding query to post to the database*/
                    $query ="INSERT INTO `police`(`id`, `firstname`, `lastname`, `email`, `phone`, `gender`, `post`, `password`, `admin`) VALUES (NULL,'$fname','$lname','$email','$phone','$gender','$post','$password','{$_SESSION['admin_email']}')";
                    /*run sql query*/
                    if (mysqli_query($con, $query)) {
                        echo 'Success...';
                    }else{
                        echo '<div class="alert alert-danger" role="alert">Something went wrong while registering The Police. Try again!!!</div>'.mysqli_error($con);
                    }
            }else{
            echo '<div class="alert alert-danger" role="alert">fill in the empty fields!!!</div>';
            }
}

}
?>