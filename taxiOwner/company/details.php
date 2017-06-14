<?php
 require "../config/company_details.php";

?>

<div class="col-md-8 col-sm-12 col-md-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading" >
                            <img src="../assets/icons/48/Info-48.png">Company Profile
                        </div>
                        <div class="panel-body">


              <div class="media">
                <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="../assets/icons/48/library-48.png" >
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading" ><?=$company_name; ?> LTD</h4>
                </div>
                </div>

                <div class="media">
                <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="../assets/icons/48/geo_fence-48.png">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"> <?=$company_location;?></h4>
                </div>
                </div>



                        </div>
                        <div class="panel-footer">
                            <?=$company_name; ?> | All Rights Reserved
                        </div>
                    </div>
                </div>

