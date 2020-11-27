<?php

  session_start();

  if(isset($_SESSION['active'])){

    require '../functions/main.php';

    $func = new main($conn);

    $data = $func->ProspectData($_SESSION['user_id']);

    date_default_timezone_set('Asia/Manila');

    $from = date('Y-m-d');
    $day = date('d')+4;
    $to = date('Y-m-'.$day);

?>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class="head-tit">
          Prospect List
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <section class="col-xs-12">
            <div class="box">
              <div class="box-body">
              <button type="button" data-toggle="modal" data-backdrop="static" data-target="#create_prospect" class="btn btn-sm btn-primary pull-right"> Add Prospect </button> <button type="button" class="btn btn-sm btn-success pull-right mod_but"> Print List </button><br><br>
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
                        <button class="btn btn-xs btn-success" onclick="P_filter()">Filter <i class="fa fa-filter"></i></button>
                        <button class="btn btn-xs btn-danger" onclick="P_resetFilter()">Reset <i class="fa fa-filter"></i></button>
                        <button class="btn btn-xs btn-warning" onclick="closeFilter()">Close <i class="fa fa-close"></i></button>
                  </div>
                </div><br><br>
                <section>
                  <div class="table-responsive dynamic_sec_grm" id="resu">
                    <?php require 'ProspectResults/PersonalProspectTable.php'; ?>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

<?php
  
  } else {

    require '../404.php';

  }

?>