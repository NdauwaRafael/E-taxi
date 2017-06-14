
<?php
require "config/driver_details.php";
?>



<div class="col-md-6 col-sm-12 col-xs-12">
                <h4 style="text-transform:uppercase;"><?=$driverFname. ' '.$driverLname; ?> Profile</h4>
                <hr>

                <div class="media">
                <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="<?php if($driverGender=='Male'){echo"../assets/icons/48/driver-48.png";}else{echo"../assets/icons/48/businesswoman-48.png"; } ?>" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading" ><?=$driverFname. ' '.$driverLname; ?></h4>
                </div>
                </div>

                <div class="media">
                <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="../assets/icons/48/mailbox_with_letter-48.png" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?=$driverEmail;?></h4>
                </div>
                </div>

                <div class="media">
                <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="../assets/icons/48/cell_phone-48.png" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?=$driverPhone;?></h4>
                </div>
                </div>

                <div class="media">
                <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="<?php if($driverGender=='Male'){echo"../assets/icons/48/male-48.png";}else{echo"../assets/icons/48/female-48.png"; } ?>" >
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?=$driverGender;?></h4>
                </div>
                </div>
             </div>




