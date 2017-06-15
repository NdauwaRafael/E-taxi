<div class="panel panel-info">
  <div class="panel-heading">Report On All Trips Made By The Taxi</div>
  <div class="panel-body">

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
	  <button type="button" class="btn btn-default" id="filer_report">Submit</button>
	</form> 
	<div id="report_status"></div> 
</div>

<div id="trips_reports" class="table-responsive">

<table class="table table-striped">

<thead>
<th>#</th>
<th>Date</th>
<th>Customer Address</th>
<th>Amount Charged</th>
</thead>


<tbody>
<?php
require "config/taxi_details.php";
$trips = "SELECT * FROM `request` WHERE `taxi` = '$plate' AND `status` = 'Completed'";
$trip_result = mysqli_query($con, $trips);
$t = 0;
while ($trip = mysqli_fetch_array($trip_result)) {
    $trip_date = $trip['request_time'];
    $trip_address = $trip['address'];
    $trip_amount = $trip['amount_charged'];
    $t++;

?>
  <tr>
     <td><?=$t;?></td>
     <td><?=$trip_date;?></td>
     <td><?=$trip_address;?></td>
     <td><?=$trip_amount;?></td>
  </tr>
<?php    
}
?>
</tbody>

</table>

</div>
  </div>
</div>


<script type="text/javascript">
	$("#filer_report").click(function(){
      var month1 = $("#month").val();
      if (month1=='') {
         $("#report_status").html("Select A month");
      }else{
         $.post("config/trips_report.php",{month:month1},function(data){
         	$("#trips_reports").html(data);
         })         
      }
	})
</script>

</div>