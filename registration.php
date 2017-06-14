<?php
require "config/connection.php";
require "config/session.php";

if (customerLoggedin()) {
    header("location: chart.html");
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Taxi</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>

        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
                    <li>
                        <a class="active-menu" href="index.html"><i class="fa fa-dashboard fa-3x"></i>Customer</a>
                    </li>

                    <li>
                        <a  href="index.html"><i class="fa fa-taxi fa-3x" aria-hidden="true"></i></i>Car Driver</a>
                    </li>
                      <li>
                        <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i> Admin</a>
                    </li>
                    <li>
                        <a   href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i> Police</a>
                    </li>



                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Online Taxi </h2>   
                        <h5>Customer Registration Form </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

                    <!-- /. ROW  -->
            <div class="row">
              <div class="col-md-12">

<form action="login.php" method="post" id="customer_reg_frm">
        <div class="form-group">
          <label >First Name</label>
          <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" required>
        </div>

        <div class="form-group">
          <label >Last Name</label>
          <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" required>
        </div>

        <div class="form-group">
          <label >Email address</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
        </div>

        <div class="form-group">
          <label >Phone Number</label>
          <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone Number" required>
        </div>

        <div class="form-group">
          <label>Gender</label>
            <select class="form-control" id="gender">
            <option value="">--------Select Gender------------</option>
            <option value="Female">Female</option>
            <option value="Male">Male</option>
            </select>          
        </div>

        <div class="form-group">
          <label >Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>

        <div class="form-group">
          <label >Confirm Password</label>
          <input type="password" name="password" class="form-control" id="cpassword" placeholder="Confirm Password" required>
        </div>

<div id="registration_status"></div>
        <button type="button" id="register" class="btn btn-default" style="  background-color: #6d4c41;
  padding-left: 15px; color:#ccc;" >Registration </button>


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
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


   
</body>
</html>
