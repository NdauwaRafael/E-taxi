<?php
require "config/owner_info.php";
?>


<div class="col-md-8 col-sm-12 col-md-offset-2">
<div class="panel panel-info">
    <div class="panel-heading" >
        <img src="../assets/icons/48/Info-48.png"><?=$ownerFname.' '.$ownerLname;?> Profile
    </div>
    <div class="panel-body">

</div><div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="<?php if($ownerGender=='Male'){echo"../assets/icons/48/businessman-48.png";}else{echo"../assets/icons/48/businesswoman-48.png";} ?>" >
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"> - <?=$ownerFname.' '.$ownerLname;?></h4>
  </div>

<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="../assets/icons/48/gender-48.png" >
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"> - <?=$ownerGender;?></h4>
  </div>

</div><div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="../assets/icons/48/cell_phone-48.png" >
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading" > - <?=$ownerPhone;?></h4>
  </div>
</div>

</div><div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="../assets/icons/48/gmail_login-48.png" alt="...">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"> - <?=$ownerEmail;?></h4>
  </div>
</div>


    </div>
    <div class="panel-footer">
        <?=$ownerFname.' '.$ownerLname;?> | All Rights Reserved
    </div>
</div>
</div>