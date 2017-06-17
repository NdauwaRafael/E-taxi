<?php
include("../config/connection.php");

?>
<table class="table table-striped">
<thead>
 <th>#</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Gender</th>
 <th>Email</th>
 <th>Phone</th>
 <th>Taxi</th>
 <th>Config</th>
 </thead>   
<tbody>
<?php
$view = "SELECT * FROM `drivers`";
$view_result = mysqli_query($con, $view);
$p=0;
while($user= mysqli_fetch_array($view_result)){
$fname = $user['firstname'];
$lname = $user['lastname'];
$email = $user['email'];
$phone = $user['phone'];
$gender= $user['gender'];
$id= $user['id'];
$p++;
?>
<tr>
 <td><?=$p;?></td>
 <td><?=$fname;?></td>
 <td><?=$lname;?></td>
 <td><?=$gender;?></td>
 <td><?=$email;?></td>
 <td><?=$phone;?></td>
 <td><?=$user['taxi_plate'];?></td>

 <td>
<button class="btn btn-default" id="delete<?=$id;?>" type="button">Delete</button>
 </td>

</tr>
<script>
$("#delete<?=$id;?>").click(function(){
    var id1 = "<?=$id;?>";
    account1 = "drivers";
    $.post("delete.php", {id:id1, account:account1}, function(data){
        alert(data);
        $("#admin_area").load("view_drivers.php");        
    })    
});

</script>
<?php
}

?>
</tbody>
</table>