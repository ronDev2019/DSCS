<?php

  session_start();

  if(isset($_SESSION['active'])){

    //echo 'Hello User <a href="functions/log-out.php"> Logout </a>';
    if($_SESSION['accessLevel'] === 'MP'){

    	include('dashboard.mp.php');

    } else {

    	include('dashboard.grm.php');

    }
 
  } else {

    include('Views/login.php');

  }


?>