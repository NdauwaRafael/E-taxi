<?php
include("config/driver_details.php"); 


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Taxi</title>
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
                <a class="navbar-brand" href="../index.html">E-Taxi</a> 
            </div>

        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../assets/img/driver1.jpg" class="user-image img-responsive"/>
					</li>

                    <li>
                        <a class="link active-menu" id="carCust"><i class="fa fa-dashboard fa-2x"></i>Home</a>
                    </li>

                    <li>
                        <a  class="link" id="profile"><i class="fa fa-user fa-2x" aria-hidden="true"></i></i><?=$driverFname.' '.$driverLname; ?></a>
                    </li>
                      <li>
                        <a href="#"><img src="../assets/icons/24/taxi-24.png"> My Taxi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a id="view_taxi">View Details</a>
                            </li>
                        </ul>
                    </li>

                     <li>
                        <a class="link"  href="tab-panel.html"><i class="fa fa-print fa-2x"></i> Notifications<span class="fa arrow"></span></a>
                   
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a id="requests">Job Requests</a>
                                    </li>
                                    <li>
                                        <a href="#">Other Notifications</a>
                                    </li>
                                </ul>                   
                    </li>                
				
                    <li>
                        <a class="link"  href="tab-panel.html"><i class="fa fa-print fa-2x"></i> Reports<span class="fa arrow"></span></a>
                   
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a id="trip_report">trip Reports</a>
                                    </li>
                                    <li>
                                        <a href="#">Cumilative Reports</a>
                                    </li>
                                </ul>                   
                    </li>

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h5><img src="../assets/icons/24/carpool-24.png" <strong style="color:black;"> | <?=$driverFname.' '.$driverLname; ?></strong> | <a href="../logout.php"> Logout</a></h5>                         
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

                    <!-- /. ROW  -->
            <div class="row">
              <div class="col-md-12">
                <div id="owner_area"></div>


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


    $("#add_company").click(function(){
        $("#owner_area").load("company/add.php");
    }) 

    $("#view_company").click(function(){
        $("#owner_area").load("company/details.php");
    })
    $("#profile").click(function(){
        $("#owner_area").load("profile.php");
    })         

    $("#view_taxi").click(function(){
        $("#owner_area").load("taxi.php");
    })

    $("#requests").click(function(){
        $("#owner_area").load("notifications.php");
    })  

    $("#trip_report").click(function(){
        $("#owner_area").load("trip_reports.php");
    })  
              
  </script>
</body>
</html>
