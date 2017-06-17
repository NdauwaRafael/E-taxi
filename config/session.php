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

function taxidriver() {
	if (isset($_SESSION['driver_email']) && !empty($_SESSION['driver_email'])) {
		return true;
	}else{
		return false;
	}
}

?>