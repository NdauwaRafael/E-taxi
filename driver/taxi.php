<?php
require "config/taxi_details.php";
 ?>

<div class="col-md-6 col-sm-12 col-xs-12">
<div class="panel panel-info">
    <div class="panel-heading" >
        <h4><img src="../assets/icons/48/Taxi.png"><?=$plate;?> Details</h4>
    </div>
    <div class="panel-body">
                <li class="list-group-item">
                <div class="media">
                <div class="media-left">
                </div>
                <div class="media-body">
                    <li class="list-group-item"><?=$plate;?></li>
                    <li class="list-group-item"><?=$route; ?></li>
                    <li class="list-group-item"><?=$description;?></li>
                </div>
                </div>
                </li>
        </div>   
</div>
</div>  