<?php

  //session_start();

  if(isset($_SESSION['active'])){

    date_default_timezone_set('Asia/Manila');

    $from = date('Y-m-d');
    $day = date('d')+4;
    $to = date('Y-m-'.$day);


?> 

      <div class="modal fade" id="view_member_prospect">
        <div class="modal-dialog modal-lg">
        <!-- Modal Content -->
          <div class="modal-content">
          <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" onclick="cloz()" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- End of Modal Header -->
            <!-- Modal Body -->
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-6">
                  <h6> Marketing Professional </h6>
                  <h4 class="modal-title agent_name"> <!--MP Name  --> </h4>
                </div>
                <div class="col-lg-6">
                  <h6> Prospect Count </h6>
                  <h3 class="modal-title text-red p-count"> <!--Prospect Count  --> </h3>
                </div>
              </div><br>
                <div class="row l-drange">
                  <div class="col-lg-12">
                    <a onclick="drange()"> Use Date Range search function... </a>
                  </div>
                </div>
                <div class="row drange">
                  <div class="col-lg-6">
                    <label>Date From:</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control" max="<?= $from ?>" value="<?= $from ?>" id="dateFrom">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <label>Date To:</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control" min="<?= $from ?>" value="<?= $to ?>" id="dateTo">
                    </div>
                  </div>
                </div>
                <div class="row drange"><br>
                  <div class="col-lg-6 pull-right text-center">
                        <input type="hidden" id="agentKey">
                        <button class="btn btn-xs btn-success" onclick="filter()">Filter <i class="fa fa-filter"></i></button>
                        <button class="btn btn-xs btn-danger" onclick="resetFilter()">Reset <i class="fa fa-filter"></i></button>
                        <button class="btn btn-xs btn-warning" onclick="closeFilter()">Close <i class="fa fa-close"></i></button>
                  </div>
                </div><br><br>
                <div class="row">
                  <div class="col-lg-12" id="resu">
                    <?php require 'ProspectResults/ProspectTable.php'; ?>
                  </div>
                </div>
            </div>
            <!-- End of Modal Body -->
          </div>
          <!-- End of Modal Content -->
        </div>
      </div>
      <!-- /.content -->
      <script>
         //Date range picker
        $('#reservation').daterangepicker();
    </script>

<?php 
  
  } else {

    require '../404.php';

  }

?>