<?php
	
	require 'main.php';

	$func = new main($conn);

	if(isset($_POST['id'])){

		$key = $func->sec($_POST['id']);

		$data = $func->getUserData($key, '[Prospecting].[Prospect.Information]', 'ProspectId');

		if(sqlsrv_has_rows($data) > 0){

			$dataVal = sqlsrv_fetch_object($data);

			$fullname = $dataVal->FirstName.' '.$dataVal->LastName;

			$val = array('message'=>true,
						 'client_id'=>$dataVal->ProspectId,
						 'client'=>$fullname
						 );
			echo json_encode($val);

		} else {

			$val = array('message'=>false,
						 'client'=>'None');
			echo json_encode($val);

		}


	} else {

		header('location:../404.php');

	}

?>