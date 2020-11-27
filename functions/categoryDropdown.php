<?php

  if(isset($_POST['agentCategory'])){

    require 'main.php';

    $func = new main($conn);

    $agentCategory = $func->sec($_POST['agentCategory']);

    if($agentCategory === "grm"){

      $table = '[Administrative].[GRM.Information]';
      $field = 'FirstName';
      $lineUp = 'ASC';
      $cati = 'GRM';
      $keyField = 'GRMId';

    } else {

      $table = '[Administrative].[Agent.Information]';
      $field = 'FirstName';
      $lineUp = 'ASC';
      $cati = 'Agent';
      $keyField = 'AgentId';

    }

  }

?>
                <select class="form-control" id="chosenAgent">
                  <option selected="selected" value="" disabled="disabled">Choose <?= $cati ?></option>
                  <?php

                    $grms = $func->getModules($table, $field, $lineUp);

                    if(sqlsrv_has_rows($grms) > 0){

                      while($grmVal = sqlsrv_fetch_object($grms)){

                      $grmFullname = $grmVal->Firstname.' '.$grmVal->Lastname;

                  ?>

                      <option value="<?= $grmVal->$keyField ?>"> <?= $grmFullname ?> </option>

                  <?php

                      }

                    } else {

                    ?>

                      <option disabled="disabled"> No Agent Available </option>

                    <?php

                    }

                  ?>
                </select>