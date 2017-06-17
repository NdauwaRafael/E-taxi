<?php
require('config/session.php');


if(customerLoggedin()){
   header("location: home.php");
}elseif (taxiowner()) {
    header("location: taxiOwner/taxiowner.php");
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
                <a class="navbar-brand" href="index.html">E-Taxi</a> 
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
                        <a class="link active-menu" id="carCust"><i class="fa fa-dashboard fa-3x"></i>Customer</a>
                    </li>

                    <li>
                        <a  class="link" id="driver"><i class="fa fa-taxi fa-3x" aria-hidden="true"></i></i>Taxi Driver</a>
                    </li>
                      <li>
                        <a class="link" id="carOwner"><i class="fa fa-taxi fa-3x" aria-hidden="true"></i> Taxi Owner</a>
                    </li>
                    <li>
                        <a class="link"  id="police"><i class="fa fa-qrcode fa-3x"></i> Police</a>
                    </li>



                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 class='changing_title'>Online Taxi </h2>   
                        <h5></h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

                    <!-- /. ROW  -->
            <div class="row">
              <div class="col-md-12">

<div id="login_load"></div>

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
    <script>

$("#login_load").load("customer_template/login.php");

          $("#carOwner").click(function(){
              $("#login_load").load("taxiOwner/login.php");
             $('.link.active-menu').removeClass('active-menu');
             $(this).addClass('active-menu'); 
             $(".changing_title").text("Car Owner Login");             
          })

          $("#carCust").click(function(){
              $("#login_load").load("customer_template/login.php");
             $('.link.active-menu').removeClass('active-menu');
             $(this).addClass('active-menu');
             $(".changing_title").text("Passager Login");

          })  

          $("#driver").click(function(){
              $("#login_load").load("driver/login.php");
             $('.link.active-menu').removeClass('active-menu');
             $(this).addClass('active-menu');
             $(".changing_title").text("Driver Login to E-taxi");

          })
          $("#police").click(function(){
              $("#login_load").load("police/login.php");
             $('.link.active-menu').removeClass('active-menu');
             $(this).addClass('active-menu');
             $(".changing_title").html('<img src="assets/icons/48/police-48.png"> Police  Login to E-taxi');

          })          
                             

    </script>
   
</body>
</html>
