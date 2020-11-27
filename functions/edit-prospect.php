<?php

	if(isset($_POST['update'])){

		require 'main.php';

		$func = new main($conn);

		$id = $func->sec($_POST['id']);

		$clientData = $func->getUserData($id, '[Prospecting].[Prospect.Information]', 'ProspectId');

		if(sqlsrv_has_rows($clientData) > 0){

			$val = sqlsrv_fetch_object($clientData);

			$activity = $func->getUserData($val->ActivityCodeId, '[Administrative].[ActivityCode]', 'ActivityCodeId');
            $contract = $func->getUserData($val->ContractCodeId, '[Administrative].[ContactCode]', 'ContractCodeId');
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

            if($contract == true){

                $contVal = sqlsrv_fetch_object($contract);

            } else {

              	$contVal = "Not Found";

            }

            if($activity == true){

                $valAct = sqlsrv_fetch_object($activity);

            } else {

              	$valAct = "Not Found";

            }

			$data = array('message'=>true,
							'pId'=>$val->ProspectId,
							'fname'=>$val->FirstName,
							'mname'=>$val->MiddleName,
							'lname'=>$val->LastName,
							'cn'=>$val->MobileNo,
							'brgy'=>$val->Address1,
							'city'=>$val->Town,
							'province'=>$val->Province,
							'model'=>$val->Model,
							'color'=>$val->Color,
							'c_code'=>$contVal->ContractCode.'. '.$contVal->ContractCodeDescription,
							'c_codeId'=>$contVal->ContractCodeId,
							'cat'=>$valCat->CategoryCode.'. '.$valCat->CategoryDescription,
							'catId'=>$valCat->CategoryId,
							'act'=>$valAct->ActivityCode,
							'actId'=>$valAct->ActivityCodeId,
							'remarks'=>$valRem->RemarksCode.'. '.$valRem->RemarksDescription,
							'remarksId'=>$valRem->RemarksId
						  );
			echo json_encode($data);

		} else {

			$data = array('message'=>false);
			echo json_encode($data);

		}

	} else {

	}
	

?>