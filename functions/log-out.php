<?php

	if(isset($_POST['logout'])){

		session_start();

		session_unset($_SESSION['active']);
		session_destroy();

		header('location:../index.php');

	} else {

		header('location:../404.php');

	}

?>