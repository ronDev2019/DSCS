<?php

  //session_start();

  if(isset($_SESSION['active'])){

    if($_SESSION['accessLevel'] === 'MP'){

?> 

  <!DOCTYPE html>
  <html>
  <head>

      <?php include('Includes/head.php'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="hold-transition skin-blue sidebar-mini" onload="data()">
  <div class="wrapper">

  <?php require 'includes/top-nav.php'; ?>
  <?php require 'includes/side-nav-left.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mp">
        <!-- Prospect Table -->
    </div>
    <!-- /.content-wrapper -->

    <!-- End Dynamic Section -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Prospecting System</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2020 <a href="https://rjldev.com">RJL Software Development</a>.</strong> All rights
      reserved.
    </footer>
  </div>
  <!-- ./wrapper -->
      <!-- DataTables -->
  <?php include('Includes/scripts.php'); ?> 
  </body>
  </html>

<?php 

    require 'Views/transfer-prospect.php';
    require 'Views/create-follow-up.php';
    require 'Views/edit-client-info.php';

    }

  } else {

    require '404.php';

  }

?>