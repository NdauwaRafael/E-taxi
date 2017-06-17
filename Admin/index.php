<?php
session_start();
if (!isset( $_SESSION['admin_email']) && empty( $_SESSION['admin_email'])) {
   header("location: login.php");
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
                    <img src="../assets/img/Aqua_Atom.png" class="user-image img-responsive"/>
					</li>

                      <li>
                        <a href="#"><img src="../assets/icons/24/police-24.png"> Police Accounts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a id="add_police">Add Police</a>
                            </li>
                            <li>
                                <a id="view_Police">View Police</a>
                            </li>
                        </ul>
                    </li>

                      <li>
                        <a href="#"><img src="../assets/icons/24/conference-24.png"> User Accounts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a id="view_owners">Taxi Owners</a>
                            </li>
                            <li>
                                <a id="view_drivers">Taxi Drivers</a>
                            </li>
                            <li>
                                <a id="view_customers">Taxi Passangers</a>
                            </li>

                        </ul>
                    </li> 

                      <li>
                        <a id="view_taxies"><img src="../assets/icons/24/taxi-24.png"> Taxies <span class="glyphicon glyphicon-hand-left"></span></a>
                    </li>                                       				

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>You Are E-Taxi Admin </h2>
                     <h5><?=$_SESSION['admin_email'];?> Click here to <span class="glyphicon glyphicon-hand-right"></span> <a href="../logout.php">Logout</a></h5>   
                   <div id="admin_area"></div>

                        
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
    
 <script>
 
     $("#add_police").click(function(){
        $("#admin_area").load("add_police.php");
    }) 

     $("#view_Police").click(function(){
        $("#admin_area").load("view_Police.php");
    })  

     $("#view_customers").click(function(){
        $("#admin_area").load("view_customers.php");
    }) 
     $("#view_owners").click(function(){
        $("#admin_area").load("view_owners.php");
    })
     $("#view_drivers").click(function(){
        $("#admin_area").load("view_drivers.php");
    })                

     $("#view_taxies").click(function(){
        $("#admin_area").load("view_taxies.php");
    }) 
 </script>  
</body>
</html>
