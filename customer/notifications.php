<?php
session_start();
include("../config/connection.php");

?>

<div class="col-md-6 col-sm-12 col-xs-12">
<div class="panel panel-success">
    <div class="panel-heading" >
        <h5><img src="assets/icons/48/filled_message-48.png">New Requests</h5>
    </div>    
<div class="panel-body">

                            <?php

                            $request = "SELECT * FROM `request` WHERE `customer`='{$_SESSION['customer_email']}' AND`status`='requested'";
                            $request_result = mysqli_query($con, $request);

                            while ($notify = mysqli_fetch_array($request_result)) {
                            $address = $notify['address'];
                            $plate = $notify['taxi'];
                            $time = $notify['request_time'];
                            $status = $notify['status'];

                ?>
                <li class="list-group-item">
                <div class="media">
                <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="assets/icons/48/mailbox_with_letter-48.png" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Request for <strong><?=$plate;?></strong></h4>
                    <p>Reqeted <strong><?=$plate;?></strong> on <strong><?=$time;?></strong> at <strong><?=$address;?></strong> </p>
                </div>
                </div>
                </li>
                <?php
                            }

                            ?>
 </div>


</div>    
</div>



<div class="col-md-6 col-sm-12 col-xs-12">
<div class="panel panel-info">
    <div class="panel-heading" >
        <h4><img src="assets/icons/48/Info-48.png">Old Requests</h4>
    </div>
    <div class="panel-body">

                            <?php

                            $requestO = "SELECT * FROM `request` WHERE `customer`='{$_SESSION['customer_email']}' AND `status`!='requested'";
                            $request_resultO = mysqli_query($con, $requestO);

                            while ($notifyO = mysqli_fetch_array($request_resultO)) {
                            $address = $notifyO['address'];
                            $plate = $notifyO['taxi'];
                            $time = $notifyO['request_time'];
                            $status = $notifyO['status'];

                ?>
                <li class="list-group-item">
                <div class="media">
                <div class="media-left">
                    <a href="#">
                    <?php if ($status=='Declined') {
                        ?>
                        <img class="media-object" src="assets/icons/48/close_window-48.png" >
                        <?php
                    }else {
                       ?>
                       <img class="media-object" src="assets/icons/48/Ok-48 .png" >
                       <?php
                    } ?>
                    
                    </a>
                </div>
                <div class="media-body">
                    <h5>Requested <strong><?=$plate;?></strong> on <strong><?=$time;?></strong> at <strong><?=$address;?></strong> </h5>
                </div>
                </div>
                </li>
                <?php
                            }

                            ?>

    </div>   
</div>


</div>        