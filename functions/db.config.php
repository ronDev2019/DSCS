<?php

	$server = "localhost";
	$credetials = array("Database"=>"DSCS", "UID"=>"cwsol", "PWD"=>"CwSol2020");

	$conn = sqlsrv_connect($server, $credetials);

	if($conn){

		//echo 'Connection Stablished';

	} else {

		echo 'Connection Failed';

	}

?>