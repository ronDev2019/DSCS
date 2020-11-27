<?php

  //session_start();

  if(isset($_SESSION['active'])){

?> 

      <div class="modal fade" id="edit_prospect">
        <div class="modal-dialog modal-lg">
        <!-- Modal Content -->
          <div class="modal-content">
          <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close closez" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h5 class="modal-title"> Update Prospect Data </h5>
            </div>
            <!-- End of Modal Header -->
            <!-- Modal Body -->
            <div class="modal-body">
              <form action="#" method="POST" class="pro_tab mt-2">
                <h5> <i class="fa fa-user"></i> Client Details </h5>
                <div class="row">
                  <div class="col-lg-4">
                    <input type="text" class="form-control" placeholder="Firstname" id="fnamez">
                  </div>
                  <div class="col-lg-4">
                    <input type="text" class="form-control" placeholder="Middlename" id="mnamez">
                  </div>
                  <div class="col-lg-4">
                    <input type="text" class="form-control" placeholder="Lastname" id="lnamez">
                  </div>
                </div>
                <div class="row contact">
                  <div class="col-lg-4">
                    <input type="text" class="form-control" placeholder="Contact No." id="contactz">
                  </div>
                </div>
                <h5 class="sec"> <i class="fa fa-home"></i> Address Details </h5>
                <div class="row">
                  <div class="col-lg-4">
                    <input type="text" class="form-control" placeholder="Barangay" id="brgyz">
                  </div>
                  <div class="col-lg-4">
                    <input type="text" class="form-control" placeholder="City" id="cityz">
                  </div>
                  <div class="col-lg-4">
                    <input type="text" class="form-control" placeholder="Province" id="provincez">
                  </div>
                </div>
                <h5 class="sec"> <i class="fa fa-car"></i> Vehicle Details </h5>
                <div class="row">
                  <div class="col-lg-4">
                    <input type="text" class="form-control" placeholder="Model" id="modelz">
                  </div>
                  <div class="col-lg-4">
                    <input type="text" class="form-control" placeholder="Color" id="colorz">
                  </div>
                </div>
                <h5 class="sec"> <i class="fa fa-phone"></i> Call Summary Details </h5>
                <div class="row">
                  <div class="col-lg-3">
                    <select class="form-control" id="contract_codez">
                      <option selected disabled value=""> Contract Code </option>
                      <?php

                      $data = $func->getModules('[Administrative].[ContactCode]', 'ContractCodeId', 'ASC');

                      if(sqlsrv_has_rows($data) > 0){

                        while($val = sqlsrv_fetch_object($data)){

                      ?>

                      <option value="<?= $val->ContractCodeId ?>"> <?= $val->ContractCode.'. '.$val->ContractCodeDescription ?> </option>

                      <?php

                        }

                      } else {

                      ?>

                      <option value="" disabled=""> No Contract Code Available </option>

                      <?php

                      }

                      ?>
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control" id="activity_codez">
                      <option selected disabled value=""> Activity Code </option>
                      <?php

                      $data = $func->getModules('[Administrative].[ActivityCode]', 'ActivityCodeId', 'ASC');

                      if(sqlsrv_has_rows($data) > 0){

                        while($val = sqlsrv_fetch_object($data)){

                      ?>

                      <option value="<?= $val->ActivityCodeId ?>"> <?= $val->ActivityCode ?> </option>

                      <?php

                        }

                      } else {

                      ?>

                      <option value="" disabled=""> No Activity Code Available </option>

                      <?php

                      }

                      ?>
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control" id="categoryz">
                      <option selected disabled value=""> Category </option>
                      <?php

                      $data = $func->getModules('[Administrative].[Category]', 'CategoryId', 'ASC');

                      if(sqlsrv_has_rows($data) > 0){

                        while($val = sqlsrv_fetch_object($data)){

                      ?>

                      <option value="<?= $val->CategoryId ?>"> <?= $val->CategoryCode.'. '.$val->CategoryDescription ?> </option>

                      <?php

                        }

                      } else {

                      ?>

                      <option value="" disabled=""> No Category Available </option>

                      <?php

                      }

                      ?>
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control" id="remarksz">
                      <option selected disabled value=""> Remarks </option>
                      <?php

                      $data = $func->getModules('[Administrative].[Remarks]', 'RemarksId', 'ASC');

                      if(sqlsrv_has_rows($data) > 0){

                        while($val = sqlsrv_fetch_object($data)){

                      ?>

                      <option value="<?= $val->RemarksId ?>"> <?= $val->RemarksCode.'. '.$val->RemarksDescription ?> </option>

                      <?php

                        }

                      } else {

                      ?>

                      <option value="" disabled=""> No Remarks Available </option>

                      <?php

                      }

                      ?>
                    </select>
                  </div>
                </div>
              </form>
            </div>
            <!-- End of Modal Body -->
            <!-- Modal Footer -->
            <div class="modal-footer">
            <input type="hidden" id="ProspectID">
              <button type="submit" class="btn btn-sm btn-warning pull-left closez" data-dismiss="modal"> Close </button>
              <button type="submit" class="btn btn-sm btn-primary" onclick="update_pros()" id="subsub"> Update </button>
            </div>
            <!-- Modal Footer -->
          </div>
          <!-- End of Modal Content -->
        </div>
      </div>

      <!-- /.content -->

<?php 
  
  } else {

    require '../404.php';

  }

?>