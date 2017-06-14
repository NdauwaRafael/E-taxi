<?php
require "../config/customer_info.php";
?>



                 <!-- /. ROW  -->

<div class="col-md-6 col-sm-12 col-xs-12">
                     <button type="button" class="btn btn-success" id="edit_profile"><i class="fa fa-edit "></i>Edit
                            </button>  
                            <hr/>
    <form>
  <div class="form-group has-success">
    <label >First Name</label>
    <input type="text" class="form-control edit" id="" value="<?=$custFname; ?>" readonly>
  </div>

  <div class="form-group has-success">
    <label >Last Name</label>
    <input type="text" class="form-control edit" id="" value="<?=$custLname; ?>" readonly>
  </div>

  <div class="form-group has-success">
    <label >Email address</label>
    <input type="email" class="form-control edit" id="" value="<?=$custEmail;?>" readonly>
  </div>

  <div class="form-group has-success">
    <label >Phone</label>
    <input type="number" class="form-control edit" id="" value="<?=$custPhone;?>" readonly>
  </div>

  <button type="submit" class="btn btn-default ">Update Now</button>
</form>

</div>


<div class="col-md-6 col-sm-12 col-xs-12">
                <h4 style="text-transform:uppercase;"><?=$custFname. ' '.$custLname; ?> Profile</h4>
                <hr>

                <div class="media">
                <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="<?php if($custGender=='Male'){echo"assets/icons/48/businessman-48.png";}else{echo"assets/icons/48/businesswoman-48.png"; } ?>" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading" ><?=$custFname. ' '.$custLname; ?></h4>
                </div>
                </div>

                <div class="media">
                <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="assets/icons/48/mailbox_with_letter-48.png" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?=$custEmail;?></h4>
                </div>
                </div>

                <div class="media">
                <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="assets/icons/48/cell_phone-48.png" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?=$custPhone;?></h4>
                </div>
                </div>

                <div class="media">
                <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="assets/icons/48/gender-48.png" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?=$custGender;?></h4>
                </div>
                </div>
             </div>

<script>
  $("#edit_profile").click(function(){
   $(.edit).removeAttr("readonly"); 
  })
</script>