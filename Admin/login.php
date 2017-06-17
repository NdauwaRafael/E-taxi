<?php
session_start();
if (isset( $_SESSION['admin_email']) && !empty( $_SESSION['admin_email'])) {
   header("location: index.php");
}
include("../config/connection.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN AREA | E-Taxi</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">E-TAXI Admin</a> 
            </div>

        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../assets/img/AlienAqua mousse.png" class="user-image img-responsive"/>
					</li>


            <li class="link active-menu">
                <a href="../start.php"><img src="../assets/icons/24/door_opened-24.png"> Go Home <span class="glyphicon glyphicon-hand-left"></span></a>
            </li>                       
                        </ul>

               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>You Are E-Taxi Admin | Login</h2> 
<?php
if($_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $login = "SELECT * FROM `admin` WHERE `email`='$email' AND `password` = '$password' ";
    $login_result = mysqli_query($con, $login);
    if(mysqli_num_rows($login_result)>0){
       $_SESSION['admin_email'] = $email;
       echo 'loggedin';
       header("location: index.php");
    }else{
       echo '<div class="alert alert-danger" role="alert">You Provided Invalid Login Credentials. Try Again</div>';
    }
} 
?>                      
 <form action="login.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="login_email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="login_password" placeholder="Password" required>
        </div>

        <div id="login_status"></div>
        <button type="submit" class="btn btn-default" style="  background-color: #6d4c41;
  padding-left: 15px; color:#ccc;" >Login</button>

      </form>                        

                        
                    </div>
                </div>
                 <!-- /. ROW  -->


    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
     
</body>
</html>
