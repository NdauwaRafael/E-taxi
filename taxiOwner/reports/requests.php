<div class="page-header">
  <h4>Filter Report Monthly</h4>
	<form class="form-inline" role="form" action="sales_report.php" method="post">
	  <div class="form-group">
	    <label class="sr-only" for="exampleInputEmail2">Select a month</label>
		<select id="month" class="form-control" placeholder="Select a month" name="month">
		 <option value="">----- Select another month (viewing only) ------</option>
         <option name="month" value="1">January</option>
         <option name="month" value="2">February</option>
         <option name="month" value="3">March</option>
         <option name="month" value="4">April</option>
         <option name="month" value="5">May</option>
         <option name="month" value="6">June</option>
         <option name="month" value="7">July</option>
         <option name="month" value="8">August</option>
         <option name="month" value="9">September</option>
         <option name="month" value="10">Octomber</option>
         <option name="month" value="11">November</option>
         <option name="month" value="12">December</option>
				</select>									    									    
	  </div>

	  <div class="form-group">
	    <label class="sr-only" >Select Category</label>
		<select id="category" class="form-control" name="category">
		 <option value="">----- Select Kind Of Request ------</option>
         <option name="category" value="All">All Requests</option>
         <option name="category" value="requested">Pending Requests</option>
         <option name="category" value="Accepted">Accepted Requests</option>
         <option name="category" value="Completed">Completed Requests</option>
         <option name="category" value="Others">Others</option>
				</select>									    									    
	  </div>      
	  <button type="button" class="btn btn-default" id="filer_report">Submit</button>
	</form> 
	<div id="report_status"></div> 
</div>

<div id="trips_reports" class="table-responsive">

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
include("../../config/connection.php"); 

$request_report = "SELECT * FROM `request` WHERE `taxi` IN (SELECT  `plate` FROM `taxi` WHERE `owner`='{$_SESSION['owner_email']}')";
$rrp = 0;
$request_report_result = mysqli_query($con, $request_report);
while ($rr = mysqli_fetch_array($request_report_result)) {
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
?>
</tbody>
</table>
</div>
<script type="text/javascript">
	$("#filer_report").click(function(){
      var month1 = $("#month").val();
      var category1 = $("#category").val();
      if (month1=='' || category1=='' ) {
         $("#report_status").html("Select ALL Options");
      }else{
         $.post("reports/config/requests.php",{month:month1, category:category1},function(data){
         	$("#trips_reports").html(data);
            $("#report_status").html("");
         })         
      }
	})
</script>