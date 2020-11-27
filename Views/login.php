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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Toyota</b> DSCS</a>
  </div>
  <!-- /.login-logo -->
  <!-- Error Section -->
  <div id="err"></div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to view dashboard</p>
      <div class="form-group has-feedback">
        <input type="search" class="form-control" id="user_name" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="pass_word" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <a href="#">I forgot my password</a><br>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" onclick="login()" id="log_in" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>

    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->

    
    <!--<a href="register.html" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php include('Includes/scripts.php'); ?>

</body>
</html>
