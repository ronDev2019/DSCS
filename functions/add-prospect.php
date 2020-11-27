<?php

	if(isset($_POST['submit'])){

		session_start();

		date_default_timezone_set('Asia/Manila');

		$user = $_SESSION['user_id'];
		$date_added = date('Y-m-d');
		$active =  1;

		require 'main.php';

		$func = new main($conn);

		$fname = $func->sec($_POST['fname']);
		$mname = $func->sec($_POST['mname']);
		$lname = $func->sec($_POST['lname']);
		$contact = $func->sec($_POST['contact']);
		$brgy = $func->sec($_POST['brgy']);
		$city = $func->sec($_POST['city']);
		$province = $func->sec($_POST['province']);
		$model = $func->sec($_POST['model']);
		$color = $func->sec($_POST['color']);

		$contract_code = $func->sec($_POST['contract_code']);
		$activity_code = $func->sec($_POST['activity_code']);
		$category = $func->sec($_POST['category']);
		$remarks = $func->sec($_POST['remarks']);

		$insert = $func->insertProspect($fname, $mname, $lname, $contact, $brgy, $city, $province, $model, $color, $contract_code, $activity_code, $category, $remarks, $active, $user, $date_added, $user, $date_added);

		if($insert == true){

			$insActivity = $func->insertActivity();

			if($insActivity == true){

				//$updateActi = $func->updateFunction('[Prospecting].[ActivityCodeLineItem]', 'ActivityCodeId',$activity_code,  ,$value2);

				$rem = true;
				echo json_encode($rem);

			} else {

				$rem = false;
				echo json_encode($rem);

			}

		} else {

			$rem = false;
			echo json_encode($rem);

		}

	} else {

		echo 'Error';

	}

?>