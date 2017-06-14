<table class="table table-condensed table-striped">

<thead>
    <th>#</th>
    <th>Names</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Gender</th>
    <th>Taxi</th>
    <th>Control</th>
</thead>
<div class="delete_status"></div>
<tbody>
<?php
session_start();
include("../../config/connection.php"); 
$driver = "SELECT * FROM `drivers` WHERE `owner`='{$_SESSION['owner_email']}'";
$driver_result = mysqli_query($con , $driver);
$a = 0;
while($drivers=mysqli_fetch_array($driver_result)){
    $fname = $drivers['firstname'];
    $lname = $drivers['lastname'];
    $email = $drivers['email'];
    $phone = $drivers['phone'];
    $gender = $drivers['gender'];
    $taxi = $drivers['taxi_plate'];
    $id = $drivers['id'];
    $a++;
?>

<tr>
        <td><?=$a;?></td>
        <td><?=$fname.' '.$lname; ?></td>
        <td><?=$email;?></td>
        <td><?=$phone;?></td>
        <td><?=$gender;?></td>
        <td><?=$taxi;?></td>
        <td><a class="btn btn-default btn-sm" role="button" data-toggle="modal" data-target="#edit<?=$id;?>"><span class="glyphicon glyphicon-cog" ></span> Edit</a> <button id="delete_driver<?=$id;?>" class="btn btn-danger btn-sm" type="button"><span class="glyphicon glyphicon-trash"></span> Delete</button></td>
</tr>

<script>
$("#delete_driver<?=$id;?>").click(function(){
  var driver_id = "<?=$id;?>";
  $.post("drivers/delete.php", {id:driver_id},function(data){
    if(data=='deleted'){
      $(".delete_status").html('<div class="alert alert-info" role="alert">Driver Account Have Been Successfuly Deleted!!</div>');
      $("#owner_area").load("drivers/details.php");
    }else{
      $(".delete_status").html(data);
    }
    
  })
})
</script>
<!-- Modal -->
<div class="modal fade" id="edit<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update <?=$fname.' '.$lname; ?> Details</h4>
      </div>
      <div class="modal-body">

<form id="update_driver<?=$id;?>">
  <div class="form-group has-success">
    <label >First Name</label>
    <input type="text" class="form-control" id="fname<?=$id;?>" value="<?=$fname;?>" placeholder="First Name">
  </div>

  <div class="form-group has-success">
    <label >Last Name</label>
    <input type="text" class="form-control" id="lname<?=$id;?>" value="<?=$lname;?>" placeholder="Last Name">
  </div>

  <div class="form-group has-success">
    <label >Phone</label>
    <input type="text" class="form-control" id="phone<?=$id;?>" value="<?=$phone;?>" placeholder="Phone">
  </div>

  <div class="form-group has-success">
    <label >Email address</label>
    <input type="email" class="form-control" id="email<?=$id;?>" value="<?=$email;?>" placeholder="Email Adress">
  </div>

  <div class="form-group has-success">
    <label >Taxi</label>
            <select class="form-control" id="taxi<?=$id;?>" >
            <option value="">Select Taxi</option>     
            <?php
            session_start();
            include("../../config/connection.php");
            $select_taxi = "SELECT * FROM `taxi` WHERE `owner`='{$_SESSION['owner_email']}'";
            $result_taxi = mysqli_query($con, $select_taxi);
            while($taxid = mysqli_fetch_array($result_taxi)){
            ?>
                <option value="<?=$taxid['plate']; ?>"><?=$taxid['plate']; ?></option>
            <?php    
            }
            ?> 
            </select> 
  </div>

<div id="update_status<?=$id;?>"></div>

  <button type="submit" class="btn btn-success" id="update_driver_btn<?=$id;?>"><span class="glyphicon glyphicon-ok"></span> Update Details</button>
</form>



<script>

$("#update_driver_btn<?=$id;?>").click(function(){
        var fname1 = $("#fname<?=$id;?>").val();
        var lname1 = $("#lname<?=$id;?>").val();
        var email1 = $("#email<?=$id;?>").val();
        var phone1 = $("#phone<?=$id;?>").val();
        var taxi1 = $("#taxi<?=$id;?>").val();
        var id1 = "<?=$id;?>";
 
    if (fname1==''|| lname1==''||email1==''||phone1==''||taxi1=='') {
             $("#update_status<?=$id;?>").html('Fill In All Empty Fields, A driver Cannot Be Added With Empty Fields').css("color","red");
        }else{
             $.post("drivers/update.php", {fname:fname1, lname:lname1, email:email1, phone:phone1, taxi:taxi1, id:id1 }, function(data){
                if(data=='updated'){
                  $("#update_driver<?=$id;?>")[0].reset();
                     $("#update_status<?=$id;?>").html('<div class="alert alert-success" role="alert"><img src="../assets/icons/48/driver-48.png"> Driver Have Been Updated Successfully</div>');
                     $("#owner_area").load("drivers/details.php");
                }else{
                     $("#update_status<?=$id;?>").html(data);
                }
             });
        }            
});

</script>
      </div>

    </div>
  </div>
</div>



<?php
}

?>

</tbody>
</table>