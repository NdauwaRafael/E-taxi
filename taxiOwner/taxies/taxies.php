<div id="col-md-12">


<?php
session_start();
include("../../config/connection.php"); 

  $taxies = "SELECT `taxi`.`id`, `plate`,`company_id`, `route`, `taxi_description`,`name` FROM `taxi`,`company` WHERE `taxi`.`owner` = '{$_SESSION['owner_email']}' AND `taxi`.`company_id`=`company`.`id`  ORDER BY `taxi`.`id` DESC";
  $taxies_result = mysqli_query($con, $taxies);
  while ($taxi = mysqli_fetch_array($taxies_result)) {
      $plate = $taxi['plate'];
      $route = $taxi['route'];
      $company= $taxi['name'];
      $company_id= $taxi['company_id'];
      $description= $taxi['taxi_description'];

?>

                <div class="media ">
                <div class="media-left media-middle">
                    <a href="#">
                    <img width="100%" class="media-object img-thumbnail" src="../assets/img/forester2.jpg" alt="...">
                    </a>
                </div>
                <div class="media-body">                    
<ul class="list-group">
<li class="list-group-item"><img src="../assets/icons/24/car-24.png"><strong> <?=$plate;?></strong></li>
  <li class="list-group-item"><img src="../assets/icons/24/marker-24.png"> <?=$route;?></li>
  <li class="list-group-item"><img src="<?php if($company_id=='3'){echo'../assets/icons/24/lock-24.png';}else{ echo'../assets/icons/24/library-24.png'; } ?> "> <?=$company;?></li>
    <li class="list-group-item"><img src="../assets/icons/24/info-24.png"> <?=$description;?></li>
    <li class="list-group-item"><img src="../assets/icons/24/settings-24.png"><a class="btn btn-default" href="#" role="button">Edit</a> <button class="btn btn-default" type="submit">Delete</button></li>
  </ul>
                </div>
                </div>

<?php      
  }

?>



</div>