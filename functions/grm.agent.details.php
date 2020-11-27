<?php
	
	session_start();

	if(isset($_SESSION['active'])){

		if(isset($_POST['member_id'])){

			require 'main.php';
			$func = new main($conn);

			$member_id = $func->sec($_POST['member_id']);

			$agent = $func->getUserData($member_id, '[DSCS].[Administrative].[Agent.Information]', 'AgentId');

			$fullname = "";

			if(sqlsrv_has_rows($agent) > 0){

				$data = sqlsrv_fetch_object($agent);

				$count = $func->ProspectCount($data->AgentId);

				$count = sqlsrv_fetch_object($count);

				$fullname = $data->Firstname.' '.$data->Middlename.' '.$data->Lastname;
				$count = $count->total;

			} else {

				$fullname = "Agent Not Found";
				$count = '';

			}

			$name = array('fullname' => $fullname, 'count' => $count );
			echo json_encode($name);

		}

	}

?>