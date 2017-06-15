<table class="table table-striped">
<thead>
<th>#</th>
<th>Date</th>
<th>Customer Address</th>
<th>Amount Charged11</th>
</thead>


<tbody>
<?php
require "../config/taxi_details.php";
if($_POST){
$month = $_POST['month'];

            $trips = "SELECT * FROM `request` WHERE `taxi` = '$plate' AND MONTH(request_time) = '$month' AND `status` = 'Completed' ";
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

}


?>
</tbody>

</table>