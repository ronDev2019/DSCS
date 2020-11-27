<?php

	if(isset($_POST['deletez'])){

		require 'main.php';

		$func = new main($conn);

		$id = $func->sec($_POST['key_id']);
		$table = '[Prospecting].[Prospect.Information]';
		$field1 = 'Deleted';
		$stat = '1';
		$field2 = 'ProspectId';

		$delete = $func->deleteData($id, $table, $field1, $field2, $stat);

		if($delete == true){

			$rem = true;

		} else {

			$rem = false;

		}
		echo json_encode($rem);

	} else {

		header("location:../");

	}

?>