<?php 

	if(isset($_POST['login'])){

		require 'main.php';

		$func = new main($conn);

		$user = $func->sec($_POST['user']);
		$pass = $func->sec($_POST['pass']);

		$func->login($user, $pass);
		//$rem = "true";
		//echo json_encode($rem);

	} else {

		echo '<script>alert("Action Not Authorized");</script>';

	}

?>