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
 <th>Post</th>
 <th>Added By</th>
 <th>Config</th>
 </thead>   
<tbody>
<?php
$view = "SELECT * FROM `police`";
$view_result = mysqli_query($con, $view);
$p=0;
while($police = mysqli_fetch_array($view_result)){
$pfname = $police['firstname'];
$plname = $police['lastname'];
$pemail = $police['email'];
$pphone = $police['phone'];
$ppost = $police['post'];
$padmin = $police['admin'];
$pgender= $police['gender'];
$pid= $police['id'];
$p++;
?>
<tr>
 <td><?=$p;?></td>
 <td><?=$pfname;?></td>
 <td><?=$plname;?></td>
 <td><?=$pgender;?></td>
 <td><?=$pemail;?></td>
 <td><?=$pphone;?></td>
 <td><?=$ppost;?></td>
 <td><?=$padmin;?></td>
 <td>
<a class="btn btn-default"  role="button" data-toggle="modal" data-target="#edit_police<?=$pid;?>">Edit</a>
<button class="btn btn-default" id="delete_police<?=$pid;?>" type="button">Delete</button>
 </td>

</tr>


<!-- Modal -->
<div class="modal fade" id="edit_police<?=$pid;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
          <form>
                <div class="form-group">
                <label >First Name</label>
                <input type="text" name="fname" class="form-control" id="fname<?=$pid;?>" value="<?=$pfname;?>" required>
                </div>

                <div class="form-group">
                <label >Last Name</label>
                <input type="text" name="lname" class="form-control" id="lname<?=$pid;?>" value="<?=$plname;?>" required>
                </div>

                <div class="form-group">
                <label >Phone Number</label>
                <input type="number" name="phone" class="form-control" id="phone<?=$pid;?>" value="<?=$pphone;?>" required>
                </div>
                <div class="form-group">
                <label >Post</label>
                <input type="text" name="post" class="form-control" id="post<?=$pid;?>" value="<?=$ppost;?>" required>                 
                </div>  
                <div id="registration_status<?=$pid;?>"></div>
             <button type="button" id="Update_police_now<?=$pid;?>" class="btn btn-default" style="  background-color: #6d4c41;
                padding-left: 15px; color:#ccc;" >Registration </button>
                </form>                      
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="close_update<?=$pid;?>" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>

$("#delete_police<?=$pid;?>").click(function(){
    var id1 = "<?=$pid;?>";
    account1 = "police";
    $.post("delete.php", {id:id1, account:account1}, function(data){
        alert(data);
        $("#admin_area").load("view_Police.php");        
    })    
});

$("#close_update<?=$pid;?>").click(function(){
    $("#admin_area").load("view_Police.php");
});

$("#Update_police_now<?=$pid;?>").click(function(){
    var fname1 = $("#fname<?=$pid;?>").val();
    var lname1 = $("#lname<?=$pid;?>").val();
    var phone1 = $("#phone<?=$pid;?>").val();
    var post1 = $("#post<?=$pid;?>").val();
    var idd = "<?=$pid;?>";

    if(fname1==''||lname1==''||phone1==''||post1==''){
        alert("fill in empty fields");
    }else{
        $.post("update.php", {fname:fname1, lname:lname1, phone:phone1, post:post1,id:idd}, function(data){
          if(data=='Updated'){
             $("#registration_status<?=$pid;?>").html('<div class="alert alert-info" role="alert">Driver Details Were Updated Successfully.</div>');
          }else{
            $("#registration_status<?=$pid;?>").html(data).css("color","red");
          }
        });
    }
})    
</script>
<?php
}

?>
</tbody>
</table>