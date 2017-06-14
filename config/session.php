<?php
session_start();

function customerLoggedin(){
	if (isset($_SESSION['customer_email']) && !empty($_SESSION['customer_email'])) {
		return true;
	}else{
		return false;
	}
}


function taxiowner() {
	if (isset($_SESSION['owner_email']) && !empty($_SESSION['owner_email'])) {
		return true;
	}else{
		return false;
	}
}

?>