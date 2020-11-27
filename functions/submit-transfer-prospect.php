<?php 	

	require 'main.php';

	$func = new main($conn);

	if(isset($_POST['submit_transfer'])){

		$comparison1 = $func->sec($_POST['id']);
		$value = $func->sec($_POST['agentID']);
		$table = '[Prospecting].[Prospect.Information]';
		$toChange = 'CreatedByUserId';
		$field1 = 'ProspectId';

		$confirm_transfer = $func->UpdateData($table, $toChange, $value, $field1, $comparison1);

		if($confirm_transfer == true){

			$message = array('returnz'=>true);
			echo json_encode($message);

		} else {

			$message = array('returnz'=>false);
			echo json_encode($message);

		}


	}

?>