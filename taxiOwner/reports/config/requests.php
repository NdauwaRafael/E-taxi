<table class="table table-condensed table-striped">

<thead>
<tr>
    <th>#</th>
    <th>Time</th>
    <th>Address</th>
    <th>Taxi</th>
    <th>Status</th>
    <th>Amount</th>

    </tr>  
</thead>

<tbody>
<?php
session_start();
include("../../../config/connection.php"); 
if($_POST){
$month = $_POST['month'];
$category= $_POST['category'];

if ($category=='Others') {
        $request_report = "SELECT * FROM `request` WHERE `taxi` IN (SELECT  `plate` FROM `taxi` WHERE `owner`='{$_SESSION['owner_email']}') AND Month(request_time)='$month' AND `status` !='Accepted' AND `status` !='requested' AND `status` !='Completed'  ";   
}elseif ($category=='All') {
        $request_report = "SELECT * FROM `request` WHERE `taxi` IN (SELECT  `plate` FROM `taxi` WHERE `owner`='{$_SESSION['owner_email']}') AND Month(request_time)='$month'";
}else{
        $request_report = "SELECT * FROM `request` WHERE `taxi` IN (SELECT  `plate` FROM `taxi` WHERE `owner`='{$_SESSION['owner_email']}') AND Month(request_time)='$month' AND `status` ='$category'";
}

$rrp = 0;
$report_result = mysqli_query($con, $request_report);
while ($rr = mysqli_fetch_array($report_result)) {
$taxi = $rr['taxi'];
$address = $rr['address'];
$time = $rr['request_time'];
$amount = $rr['amount_charged'];
$status = $rr['status'];
$rrp++;
?>
<tr>
<td><?=$rrp;?></td>
<td><?=$time;?></td>
<td><?=$address; ?></td>
<td><?=$taxi; ?></td>
<td><?=$status; ?></td>
<td>Ksh. <?=$amount?></td>
</tr>
<?php
}
}
?>
</tbody>
</table>