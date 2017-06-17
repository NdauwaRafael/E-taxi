<?php
include("../config/connection.php");

?>
<table class="table table-striped">
<thead>
 <th>#</th>
 <th>Plate</th>
 <th>Owner</th>
 <th>Route</th>
 <th>Desscription</th>
 <th>Config</th>
 </thead>   
<tbody>
<?php
$view = "SELECT * FROM `taxi` ORDER BY `id` DESC";
$view_result = mysqli_query($con, $view);
$p=0;
while($car= mysqli_fetch_array($view_result)){
$plate = $car['plate'];
$route = $car['route'];
$owner= $car['owner'];
$description = $car['taxi_description'];
$id= $car['id'];
$p++;
$trancated_description = substr($description, 0 ,100)."....";
?>
<tr>
 <td><?=$p;?></td>
 <td><?=$plate;?></td>
 <td><?=$owner;?></td>
 <td><?=$route;?></td>
 <td><?=$trancated_description;?></td>

 <td>
<button class="btn btn-default" id="delete<?=$id;?>" type="button">Delete</button>
 </td>

</tr>
<script>
$("#delete<?=$id;?>").click(function(){
    var id1 = "<?=$id;?>";
    account1 = "taxi";
    $.post("delete.php", {id:id1, account:account1}, function(data){
        alert(data);
        $("#admin_area").load("view_taxies.php");        
    })    
});

</script>
<?php
}

?>
</tbody>
</table>