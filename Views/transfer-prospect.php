<?php

  //session_start();

  if(isset($_SESSION['active'])){

?> 

      <div class="modal fade" id="transfer_prospect">
        <div class="modal-dialog modal-sm">
        <!-- Modal Content -->
          <div class="modal-content">
          <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h5 class="modal-title"> Transfer Prospect Form </h5>
            </div>
            <!-- End of Modal Header -->
            <!-- Modal Body -->
            <div class="modal-body">
              <p> Transfer Client: <strong id="cliName"></strong> </p><br>
              <p>To agent:</p>
              <div class="form-group">
                <select class="form-control ddown" onchange="category_select()">
                  <option value="" selected="selected" disabled="disabled"> Category </option>
                  <option  value="grm"> GRM </option>
                  <option  value="mp"> MP </option>
                </select>
              </div>
              <!-- GRM Section -->
              <div class="form-group" id="grmSection">
                <!-- Dynamic Dropdown -->
              </div>
              <!-- End of GRM Section -->
            </div>
            <!-- End of Modal Body -->
            <!-- Modal Footer -->
            <div class="modal-footer">
              <input type="hidden" id="ClientID">
              <button type="submit" class="btn btn-xs btn-warning" data-dismiss="modal"> Cancel </button>
              <button type="submit" class="btn btn-xs btn-primary" id="subsubz"> Transfer </button>
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