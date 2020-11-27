<?php

  //session_start();

  if(isset($_POST['filter'])){

    session_start();

    require '../../functions/main.php';
    $func = new main($conn);

    $agentid = $func->sec($_SESSION['user_id']);
    $from = $func->sec($_POST['dateFrom']);
    $to = $func->sec($_POST['dateTo']);

    $data = $func->FilteredProspectData($agentid, $from, $to);

    ?>

                <!-- Prospect Table -->
                  <table id="prosList" class="table table-bordered table-striped table-hovered display nowrap">
                    <thead>
                      <tr>
                        <th> No. </th>
                        <th> Customer </th>
                        <th> Category </th>
                        <th> Remarks </th>
                        <th> Last Update </th>
                        <th class="text-center"> Actions </th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php

                    if(sqlsrv_has_rows($data) > 0){

                      while($val = sqlsrv_fetch_object($data)){

                        $Remarks = $func->getUserData($val->Remarks, '[Administrative].[Remarks]', 'RemarksId');
                        $category = $func->getUserData($val->CategoryId, '[Administrative].[Category]', 'CategoryId');

                        if($category == true){

                            $valCat = sqlsrv_fetch_object($category);

                        } else {

                          $cat = "Not Found";

                        }


                        if($Remarks == true){

                            $valRem = sqlsrv_fetch_object($Remarks);

                        } else {

                          $rem = "Not Found";

                        }

                        $cat = $valCat->CategoryDescription;

                        if($cat === "Hot Prospect"){

                          $cat_color = "green";

                        } else if($cat === "Medium Prospect"){

                          $cat_color = "yellow";

                        } else {

                          $cat_color = "red";

                        }

                        $rem = $valRem->RemarksCode;

                        if($rem === "WFU" || $rem === "Waiting for unit"){

                          $rem_color = "green";

                        } else if($rem === "ASFU" || $rem === "After Sales Follow-up"){

                          $rem_color = "yellow";

                        } else {

                          $rem_color = "red";

                        }

                        //$date = Date('Y-m-d h:i:s');
                        $date = $val->DateModified;
                        $date = $date->format('M d, Y');

                    ?>

                    <tr>
                      <td><?= $val->ProspectId ?> </td>
                      <td><?= $val->FirstName.' '.$val->LastName ?></td>
                      <td> <label class="label bg-<?= $cat_color ?>"> <?= $cat ?> </label> </td>
                      <td> <label class="label bg-<?= $rem_color ?>"> <?= $rem ?> </label> </td>
                      <td> <?= $date ?> </td>
                      <td class="text-center">
                        <button class="btn btn-xs btn-success view" onclick="view(<?= $val->ProspectId ?>)" data-toggle="tooltip" title="View Details"> <i class="fa fa-eye"> </i> </button> 
                        <button class="btn btn-xs btn-warning edit" onclick="edit(<?= $val->ProspectId ?>)" data-toggle="modal" data-backdrop="static" data-target="#edit_prospect" title="Edit"> <i class="fa fa-edit"> </i> </button> 
                        <button class="btn btn-xs btn-info transfer" onclick="transfer(<?= $val->ProspectId ?>)" data-toggle="tooltip" title="Transfer Prospect"> <i class="fa fa-send"> </i> </button> 
                        <button class="btn btn-xs btn-danger delete" onclick="deletez(<?= $val->ProspectId ?>)" id="deletez" data-toggle="tooltip" title="Delete"> <i class="fa fa-trash-o"> </i> </button>
                      </td>
                    </tr>

                    <?php


                      }

                    ?>

                    </tbody>
                    <tfoot>
                      <tr>
                        <th> No. </th>
                        <th> Customer </th>
                        <th> Category </th>
                        <th> Remarks </th>
                        <th> Last Update </th>
                        <th class="text-center"> Actions </th>
                      </tr>
                    </tfoot>
                  </table>
                  <!-- End Prospect Table -->
    <?php

    }

  }  else if(isset($_POST['reset'])) {

    session_start();

    require '../../functions/main.php';
    $func = new main($conn);

    $agentid = $func->sec($_SESSION['user_id']);

    $data = $func->ProspectData($agentid);

    ?>

                <!-- Prospect Table -->
                  <table id="prosList" class="table table-bordered table-striped table-hovered display nowrap">
                    <thead>
                      <tr>
                        <th> No. </th>
                        <th> Customer </th>
                        <th> Category </th>
                        <th> Remarks </th>
                        <th> Last Update </th>
                        <th class="text-center"> Actions </th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php

                    if(sqlsrv_has_rows($data) > 0){

                      while($val = sqlsrv_fetch_object($data)){

                        $Remarks = $func->getUserData($val->Remarks, '[Administrative].[Remarks]', 'RemarksId');
                        $category = $func->getUserData($val->CategoryId, '[Administrative].[Category]', 'CategoryId');

                        if($category == true){

                            $valCat = sqlsrv_fetch_object($category);

                        } else {

                          $cat = "Not Found";

                        }


                        if($Remarks == true){

                            $valRem = sqlsrv_fetch_object($Remarks);

                        } else {

                          $rem = "Not Found";

                        }

                        $cat = $valCat->CategoryDescription;

                        if($cat === "Hot Prospect"){

                          $cat_color = "green";

                        } else if($cat === "Medium Prospect"){

                          $cat_color = "yellow";

                        } else {

                          $cat_color = "red";

                        }

                        $rem = $valRem->RemarksCode;

                        if($rem === "WFU" || $rem === "Waiting for unit"){

                          $rem_color = "green";

                        } else if($rem === "ASFU" || $rem === "After Sales Follow-up"){

                          $rem_color = "yellow";

                        } else {

                          $rem_color = "red";

                        }

                        //$date = Date('Y-m-d h:i:s');
                        $date = $val->DateModified;
                        $date = $date->format('M d, Y');

                    ?>

                    <tr>
                      <td><?= $val->ProspectId ?> </td>
                      <td><?= $val->FirstName.' '.$val->LastName ?></td>
                      <td> <label class="label bg-<?= $cat_color ?>"> <?= $cat ?> </label> </td>
                      <td> <label class="label bg-<?= $rem_color ?>"> <?= $rem ?> </label> </td>
                      <td> <?= $date ?> </td>
                      <td class="text-center">
                        <button class="btn btn-xs btn-success view" onclick="view(<?= $val->ProspectId ?>)" data-toggle="tooltip" title="View Details"> <i class="fa fa-eye"> </i> </button> 
                        <button class="btn btn-xs btn-warning edit" onclick="edit(<?= $val->ProspectId ?>)" data-toggle="modal" data-backdrop="static" data-target="#edit_prospect" title="Edit"> <i class="fa fa-edit"> </i> </button> 
                        <button class="btn btn-xs btn-info transfer" onclick="transfer(<?= $val->ProspectId ?>)" data-toggle="tooltip" title="Transfer Prospect"> <i class="fa fa-send"> </i> </button> 
                        <button class="btn btn-xs btn-danger delete" onclick="deletez(<?= $val->ProspectId ?>)" id="deletez" data-toggle="tooltip" title="Delete"> <i class="fa fa-trash-o"> </i> </button>
                      </td>
                    </tr>

                    <?php


                      }

                    ?>

                    </tbody>
                    <tfoot>
                      <tr>
                        <th> No. </th>
                        <th> Customer </th>
                        <th> Category </th>
                        <th> Remarks </th>
                        <th> Last Update </th>
                        <th class="text-center"> Actions </th>
                      </tr>
                    </tfoot>
                  </table>
                  <!-- End Prospect Table -->
    <?php

      }

    } else {

    //require '../../functions/main.php';
    //$func = new main($conn);

    $agentid = $func->sec($_SESSION['user_id']);

    $data = $func->ProspectData($agentid);

    ?>

                <!-- Prospect Table -->
                  <table id="prosList" class="table table-bordered table-striped table-hovered display nowrap">
                    <thead>
                      <tr>
                        <th> No. </th>
                        <th> Customer </th>
                        <th> Category </th>
                        <th> Remarks </th>
                        <th> Last Update </th>
                        <th class="text-center"> Actions </th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php

                    if(sqlsrv_has_rows($data) > 0){

                      while($val = sqlsrv_fetch_object($data)){

                        $Remarks = $func->getUserData($val->Remarks, '[Administrative].[Remarks]', 'RemarksId');
                        $category = $func->getUserData($val->CategoryId, '[Administrative].[Category]', 'CategoryId');

                        if($category == true){

                            $valCat = sqlsrv_fetch_object($category);

                        } else {

                          $cat = "Not Found";

                        }


                        if($Remarks == true){

                            $valRem = sqlsrv_fetch_object($Remarks);

                        } else {

                          $rem = "Not Found";

                        }

                        $cat = $valCat->CategoryDescription;

                        if($cat === "Hot Prospect"){

                          $cat_color = "green";

                        } else if($cat === "Medium Prospect"){

                          $cat_color = "yellow";

                        } else {

                          $cat_color = "red";

                        }

                        $rem = $valRem->RemarksCode;

                        if($rem === "WFU" || $rem === "Waiting for unit"){

                          $rem_color = "green";

                        } else if($rem === "ASFU" || $rem === "After Sales Follow-up"){

                          $rem_color = "yellow";

                        } else {

                          $rem_color = "red";

                        }

                        //$date = Date('Y-m-d h:i:s');
                        $date = $val->DateModified;
                        $date = $date->format('M d, Y');

                    ?>

                    <tr>
                      <td><?= $val->ProspectId ?> </td>
                      <td><?= $val->FirstName.' '.$val->LastName ?></td>
                      <td> <label class="label bg-<?= $cat_color ?>"> <?= $cat ?> </label> </td>
                      <td> <label class="label bg-<?= $rem_color ?>"> <?= $rem ?> </label> </td>
                      <td> <?= $date ?> </td>
                      <td class="text-center">
                        <button class="btn btn-xs btn-success view" onclick="view(<?= $val->ProspectId ?>)" data-toggle="tooltip" title="View Details"> <i class="fa fa-eye"> </i> </button> 
                        <button class="btn btn-xs btn-warning edit" onclick="edit(<?= $val->ProspectId ?>)" data-toggle="modal" data-backdrop="static" data-target="#edit_prospect" title="Edit"> <i class="fa fa-edit"> </i> </button> 
                        <button class="btn btn-xs btn-info transfer" onclick="transfer(<?= $val->ProspectId ?>)" data-toggle="tooltip" title="Transfer Prospect"> <i class="fa fa-send"> </i> </button> 
                        <button class="btn btn-xs btn-danger delete" onclick="deletez(<?= $val->ProspectId ?>)" id="deletez" data-toggle="tooltip" title="Delete"> <i class="fa fa-trash-o"> </i> </button>
                      </td>
                    </tr>

                    <?php


                      }

                    ?>

                    </tbody>
                    <tfoot>
                      <tr>
                        <th> No. </th>
                        <th> Customer </th>
                        <th> Category </th>
                        <th> Remarks </th>
                        <th> Last Update </th>
                        <th class="text-center"> Actions </th>
                      </tr>
                    </tfoot>
                  </table>
                  <!-- End Prospect Table -->
    <?php

    }

  }

?>

<script>
  $('#prosList').DataTable({
    'paging': true,
    'lengthChange': true,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': true,
    'responsive': true
  });
</script>