<?php
require "config/taxi_details.php";
?>


<div class="col-md-4 col-sm-4 ">
<div class="panel panel-info">
    <div class="panel-heading" >
        <img src="../assets/icons/48/about-48.png"> New Requests
    </div>
    <div class="panel-body">
<?php 
$new_requests = "SELECT * FROM `request` WHERE `taxi`='$plate' AND `status`='requested'  ";
$new_results  = mysqli_query($con, $new_requests);
while ($new = mysqli_fetch_array($new_results)) {
     $id = $new['id'];
     $car = $new['taxi'];
     $address = $new['address'];
     $customer = $new['customer'];
     $request_time = $new['request_time'];
  $now = time();
  $diff = $now-strtotime($request_time);
  $mins = round(abs($diff) / 60);  

?>
<li class="list-group-item"><img src="../assets/icons/24/new_message-24.png"><strong><?=$address;?></strong> <?= $mins; ?> Mins Ago <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#new_request<?=$id;?>"><span class="glyphicon glyphicon-resize-full"></span> view</button></li>


<div class="modal fade" id="new_request<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Request</h4>
      </div>
      <div class="modal-body">
<div id="request_status<?=$id;?>"></div>
<p>You have a new Request at <strong><?=$address;?></strong> Requested <?= $mins; ?> Minutes Ago</p>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal" id="close<?=$id;?>">Close</button>
        <button type="button" class="btn btn-danger" id="decline<?=$id;?>">Decline</button>
        <button type="button" class="btn btn-success" id="accept_request<?=$id;?>"><span class="glyphicon glyphicon-ok-sign"></span> Accept This Request</button>
      </div>      
    </div>
  </div>
</div>

<script>
  $("#accept_request<?=$id;?>").click(function(){
      var id1 = "<?=$id;?>";
      var status1 = "Accepted";

      $.post("config/modify_request.php", {id:id1, status:status1}, function(data) {
          if(data=='Accepted'){
            $("#request_status<?=$id;?>").html('<div class="alert alert-success" role="alert">Request Have Been Accepted</div>');
          }else {
              $("#request_status<?=$id;?>").html(data);
          }
      });
  });

$("#decline<?=$id;?>").click(function(){
      var id1 = "<?=$id;?>";
      var status1 = "Declined";

      $.post("config/modify_request.php", {id:id1, status:status1}, function(data) {
          if(data=='Declined'){
             $("#request_status<?=$id;?>").html('<div class="alert alert-danger" role="alert">Request Have Been Declined</div>');
          }else {
              $("#request_status<?=$id;?>").html(data);
          }
      });    
})
  $("#close<?=$id;?>").click(function(){
      $("#owner_area").load("notifications.php");
  });
</script>
<?php     
}
?>


        </div>   
</div>
</div>




<div class="col-md-4 col-sm-4 ">
<div class="panel panel-success">
    <div class="panel-heading" >
        <img src="../assets/icons/48/sms-48.png"> Accepted Requests
    </div>
    <div class="panel-body">
<?php 
$accepted_requests = "SELECT * FROM `request` WHERE `taxi`='$plate' AND `status`='Accepted' ";
$accepted_results  = mysqli_query($con, $accepted_requests);
while ($accepted = mysqli_fetch_array($accepted_results)) {
     $idd = $accepted['id'];
     $car = $accepted['taxi'];
     $address = $accepted['address'];
     $customer = $accepted['customer'];
     $respond_time = $accepted['responded_at'];
  $now = time();
  $diff = $now-strtotime($respond_time);
  $minutes = round(abs($diff) / 60);
  $mins = $minutes. " Minutes";
  $sec = $diff. " Seconds"; 

$when  = strtotime($respond_time);

function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}

?>
<li class="list-group-item"><img src="../assets/icons/24/new_message-24.png"><strong><?=$address;?></strong> <?='Request Was Accepted '.humanTiming($when ).' Ago';?>  <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#accepted_request<?=$idd;?>"><span class="glyphicon glyphicon-resize-full"></span> Finish</button></li>


<div class="modal fade" id="accepted_request<?=$idd;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Request</h4>
      </div>
      <div class="modal-body">
<div id="finish_status<?=$idd;?>"></div>
<p>You have a new Request at <strong><?=$address;?></strong> <?php echo'Requested '.humanTiming($when).' Ago'?>  </p>

  <div class="form-group">
    <label >Amount Charged (Ksh.)</label>
    <input type="number" class="form-control" id="amount<?=$idd;?>" placeholder="Amount Charged">
  </div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal" id="close_finish<?=$idd;?>">Close</button>
        <button type="button" class="btn btn-success" id="finish_request<?=$idd;?>"><span class="glyphicon glyphicon-ok-sign"></span> Finish</button>
      </div>      
    </div>
  </div>
</div>
<script>
    $("#finish_request<?=$idd;?>").click(function(){
         var idd1 = "<?=$idd;?>";
         var amount1 = $("#amount<?=$idd;?>").val();
         if(idd1==''||amount1==''){
             $("#finish_status<?=$idd;?>").html("Fill In Amount Charged For The Trip Before Proceeding").css("color","red");
         }else{
             $.post("config/finish.php",{idd:idd1, amount:amount1},function(data){
                  
                  if(data=='Job Finished'){
                       $("#finish_status<?=$idd;?>").html('<div class="alert alert-success" role="alert">This Job Have Been Successfully Completed, Details Have Been Submitted To The Owner Of This Taxi For Report Purposes.</div>');
                  }else{
                     $("#finish_status<?=$idd;?>").html(data);
                  }
             });
         }

    })

  $("#close_finish<?=$idd;?>").click(function(){
      $("#owner_area").load("notifications.php");
  });    
</script>
<?php     
}
?>

        </div>   
</div>
</div>  


<div class="col-md-4 col-sm-4 ">
<div class="panel panel-primary">
    <div class="panel-heading" >
        <img src="../assets/icons/48/speech_bubble-48.png"> Completed Requests 
    </div>
    <div class="panel-body">
<?php 
$accepted_requests = "SELECT * FROM `request` WHERE `taxi`='$plate' AND `status`='Finished' ";
$accepted_results  = mysqli_query($con, $accepted_requests);
while ($accepted = mysqli_fetch_array($accepted_results)) {
     $idd = $accepted['id'];
     $car = $accepted['taxi'];
     $address = $accepted['address'];
     $customer = $accepted['customer'];
     $respond_time = $accepted['responded_at'];
  $now = time();
  $diff = $now-strtotime($respond_time);
  $minutes = round(abs($diff) / 60);
  $mins = $minutes. " Minutes";
  $sec = $diff. " Seconds"; 

$when = strtotime($respond_time);

function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}

?>
<li class="list-group-item">
<img src="../assets/icons/24/read_message-24.png">
<strong><?=$address;?></strong> <?='The Job Was Accepted  '.humanTiming($when ).' Ago';?> 
</li>
<?php } ?>

        </div>   
</div>
</div>  