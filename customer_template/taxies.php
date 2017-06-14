<div class="col-md-12">

<?php
include("../config/connection.php");

  $taxies = "SELECT `taxi`.`id`, `plate`,`company_id`, `route`, `taxi_description`,`name` FROM `taxi`,`company` WHERE `taxi`.`company_id`=`company`.`id`  ORDER BY `taxi`.`id` DESC Limit 10";
  $taxies_result = mysqli_query($con, $taxies);
  while ($taxi = mysqli_fetch_array($taxies_result)) {
      $taxi_id = $taxi['id'];
      $plate = $taxi['plate'];
      $route = $taxi['route'];
      $company= $taxi['name'];
      $company_id= $taxi['company_id'];
      $description= $taxi['taxi_description'];

      $trancated_description = substr($description, 0 ,100)."....";
?>


                <div class="media ">
                <div class="media-left media-middle col-xs-4">
                    <a href="#">
                    <img width="100%" class="media-object img-thumbnail" src="assets/img/forester2.jpg" alt="...">
                    </a>
                </div>
                <div class="media-body">                    
                        <ul class="list-group">
                        <li class="list-group-item"><img src="assets/icons/24/car-24.png"><strong> <?=$plate;?></strong></li>
                        <li class="list-group-item"><img src="assets/icons/24/marker-24.png"> <?=$route;?> | <img src="<?php if($company_id=='3'){echo'assets/icons/24/lock-24.png';}else{ echo'assets/icons/24/library-24.png'; } ?> "> <?=$company;?></li>
                        <li class="list-group-item"><?=$trancated_description;?></li>
                            <li class="list-group-item"><img src="assets/icons/24/toggle_on-24.png"> | Car Moment Away | <a class="btn btn-success btn-sm" href="#" role="button" data-toggle="modal" data-target="#request<?=$taxi_id;?>"><img src="assets/icons/24/nui2-24.png"> Request</a> </li>
                        </ul>
                                        </div>
                </div>

<!-- Modal -->
<div class="modal fade" id="request<?=$taxi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Request Car <strong><?=$plate; ?></strong></h4>
      </div>
      <div class="modal-body">

<form id="request_frm<?=$taxi_id;?>">
  <div class="form-group addrs">
    <label >Your Address</label>
    <input type="text" class="form-control" id="your_address<?=$taxi_id;?>" placeholder="Your Address">
  </div>

<div id="request_status<?=$taxi_id;?>"></div>
  <button type="button" class="btn btn-default" id="request_btn<?=$taxi_id;?>">Request</button>
</form>

      </div>
    </div>
  </div>
</div>
<script>
   $("#request_btn<?=$taxi_id;?>").click(function(){
       var address1 = $("#your_address<?=$taxi_id;?>").val();
       var car1 = "<?=$plate;?>";
       if(address1==''){
           $("#request_status<?=$taxi_id;?>").html('Fill In Your Location Before Requesting For A Car').css("color","red");
           $(".addrs").addClass("form-group has-error");
       }else{
           $.post("customer/request.php",{address:address1, car:car1},function(data){
              
              if (data=='requested') {
                   $("#request_status<?=$taxi_id;?>").html('<div class="alert alert-success" role="alert">Success, The Car Has Been Requested. Our Driver is on the way to pick you. <img src="assets/icons/48/Taxi.png"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>');
                   $("#request_frm<?=$taxi_id;?>")[0].reset();
              }else{
                 $("#request_status<?=$taxi_id;?>").html(data);
              }
           }) 
       }
   })

</script>
<?php
  }
?>

</div>