<?php

  session_start();

  if(isset($_SESSION['active'])){

    require '../functions/main.php';

    $func = new main($conn);

	$id = $_SESSION['user_id'];
	$table = '[Administrative].[User.Information]';	

    $data = $func->getUserData($id, $table, "AgentInformationId");

    $val = sqlsrv_fetch_object($data);

    $members = $func->getUserData($val->AgentInformationId,'[DSCS].[Administrative].[Agent.Information]','GRMId');


?>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <?php

        if(sqlsrv_has_rows($members) > 0){

        	while($data = sqlsrv_fetch_object($members)){

       	?>

	        <div class="col-md-4">
	          <!-- Widget: user widget style 1 -->
	          <div class="box box-widget widget-user">
	            <!-- Add the bg color to the header using any of the bg-* classes -->
	            <div class="widget-user-header bg-primary">
	              <h4 class="widget-user-username"><?= $data->Firstname.' '.$data->Lastname ?></h4>
	              <h6 class="widget-user-desc">Marketing Professional</h6>
	            </div>
	            <div class="widget-user-image">
	              <img class="img-circle" src="dist/img/avatar5.png" alt="User Avatar">
	            </div>
	            <div class="box-footer">
	              <div class="row">
	                <div class="col-sm-4"></div>
	                <!-- /.col -->
	                <div class="col-sm-4">
	                  <div class="description-block">
	   					<button class="btn btn-xs btn-primary" data-toggle="modal" data-backdrop="static" data-target="#view_member_prospect" onclick="member_prospect(<?= $data->AgentId ?>)"> View Propects </button>
	                  </div>
	                  <!-- /.description-block -->
	                </div>
	                <!-- /.col -->
	                <div class="col-sm-4"></div>
	                <!-- /.col -->
	              </div>
	              <!-- /.row -->
	            </div>
	          </div>
	          <!-- /.widget-user -->
	        </div>

       	<?php

        	}

        } else {

        ?>
        <br><br>
        <h5 class="text-center"> You have no Marketing Professional in your group yet. </h5>
        <br><br>
        <?php

        }

        ?>

        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

<?php

  } else {

    require '../404.php';

  }

?>