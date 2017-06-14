<table class="table table-condensed table-striped">

<thead>
    <th>#</th>
    <th>Plate</th>
    <th>Route</th>
    <th>Company</th>
    <th>Driver</th>
</thead>

<tbody>
<?php
session_start();
include("../../config/connection.php"); 
  $taxies = "SELECT `taxi`.`id`, `plate`,`company_id`, `route`, `taxi_description`,`name`,`firstname`, `lastname` FROM `taxi`,`company`,`drivers` WHERE `taxi`.`owner` = '{$_SESSION['owner_email']}' AND `taxi`.`company_id`=`company`.`id` AND `drivers`.`taxi_plate` = `taxi`.`plate`  ORDER BY `taxi`.`id` DESC";
  $a=0;
  $taxies_result = mysqli_query($con, $taxies) or die(mysqli_error($con));
  while ($taxi = mysqli_fetch_array($taxies_result)) {
      $plate = $taxi['plate'];
      $route = $taxi['route'];
      $company= $taxi['name'];
      $company_id= $taxi['company_id'];
      $description= $taxi['taxi_description'];
      $driver_name = $taxi['firstname'].' '.$taxi['lastname'];
      $a++;
?>

<tr>
        <td><?=$a;?></td>
        <td><?=$plate ?></td>
        <td><?=$route;?></td>
        <td><?=$company;?></td>

        <td><?=$driver_name; ?></td>
</tr>



<?php
}

?>

</tbody>
</table>