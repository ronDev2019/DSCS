<?php
	
	require 'db.config.php';

	class main {

		public $db;

		public function __construct($dbase){

			$this->db = $dbase;

		}

		public function sec($data){

			$data = htmlspecialchars($data);
			$data = htmlentities($data);
			$data = stripslashes($data);
			$data = trim($data);
			return $data;


		}

		public function login($username, $password){

			$loginn = sqlsrv_query($this->db, "SELECT * FROM [Administrative].[User.Information] WHERE Username = '$username' AND Password = '$password' AND Active = 1");

			if(sqlsrv_has_rows($loginn) > 0){

				$data = sqlsrv_fetch_object($loginn);

				if($username === $data->Username && $password === $data->Password){

					session_start();

					$_SESSION['active'] = "Active";
					$_SESSION['accessLevel'] = $data->AccessLevel;
					$_SESSION['user'] = $data->Username;
					$_SESSION['user_id'] = $data->AgentInformationId;

					$response = "true";

				} else {

					$response = "false";

				}

			} else {

				$response = "false";

			}
			echo json_encode($response);

		}

		public function getUserData($id, $table, $field){

			$data = sqlsrv_query($this->db, "SELECT * FROM $table WHERE $field = $id");
			return $data;

		}

		public function deleteData($id, $table, $field1, $field2, $stat){

			$data = sqlsrv_query($this->db, "UPDATE $table SET $field1 = '$stat' WHERE $field2 = $id");
			return $data;

		}

		public function ProspectData($agent){

			$data = sqlsrv_query($this->db, "SELECT * FROM [Prospecting].[Prospect.Information] WHERE Deleted != 'True' AND CreatedByUserId = '$agent' ORDER BY ProspectId ASC");
			return $data;

		}

		public function FilteredProspectData($agent, $from, $to){

			$data = sqlsrv_query($this->db, "SELECT * FROM [Prospecting].[Prospect.Information] WHERE Deleted != 'True' AND CreatedByUserId = '$agent' AND DateModified >= '$from' AND DateModified <= '$to' ORDER BY ProspectId ASC");
			return $data;

		}

		public function getModules($table, $field, $lineUp){

			$data = sqlsrv_query($this->db, "SELECT * FROM $table ORDER BY $field $lineUp");
			return $data;

		}

		public function insertProspect($fname, $mname, $lname, $contact, $brgy, $city, $province, $model, $color, $contract_code, $activity_code, $category, $remarks, $active, $user, $date_added){

			$data = sqlsrv_query($this->db, "INSERT INTO [Prospecting].[Prospect.Information] (FirstName,MiddleName,LastName,Address1,Town,Province,MobileNo,Model,Color,ContractCodeId,ActivityCodeId,CategoryId,Remarks,Active,CreatedByUserId,DateCreated,ModifiedByUserId,DateModified)
																							VALUES ('$fname','$mname','$lname','$brgy','$city','$province','$contact','$model','$color','$contract_code','$activity_code','$category','$remarks','$active','$user','$date_added','$user','$date_added')");

			return $data;

		}

		public function updateProspect($pid, $fname, $mname, $lname, $contact, $brgy, $city, $province, $model, $color, $contract_code, $activity_code, $category, $remarks, $active, $user, $date_added){

			$data = sqlsrv_query($this->db, "UPDATE [Prospecting].[Prospect.Information] SET 
																						FirstName = '$fname',
																						MiddleName = '$mname',
																						LastName = '$lname',
																						Address1 = '$brgy',
																						Town = '$city',
																						Province = '$province',
																						MobileNo = '$contact',
																						Model = '$model',
																						Color = '$color',
																						ContractCodeId = '$contract_code',
																						ActivityCodeId = '$activity_code',
																						CategoryId = '$category',
																						Remarks = '$remarks',
																						Active = '$active',
																						CreatedByUserId = '$user',
																						DateCreated = '$date_added',
																						ModifiedByUserId = '$user',
																						DateModified = '$date_added'
																						WHERE ProspectId = $pid");

			return $data;

		}

		public function insertActivity(){

			$data = sqlsrv_query($this->db,"INSERT INTO [Prospecting].[ActivityCodeLineItem] (ProspectId, ContractCodeId, ActivityCodeId, CategoryId, Remarks, Active, CreatedByUserId, DateCreated, ModifiedByUserId, DateModified) SELECT TOP(1) ProspectId, ContractCodeId, ActivityCodeId, CategoryId, Remarks, Active, CreatedByUserId, DateCreated, ModifiedByUserId, DateModified FROM [Prospecting].[Prospect.Information] ORDER BY ProspectId DESC");

			return $data;

		}

		public function updateActivity($pid){

			$data = sqlsrv_query($this->db,"INSERT INTO [Prospecting].[ActivityCodeLineItem] (ProspectId, ContractCodeId, ActivityCodeId, CategoryId, Remarks, Active, CreatedByUserId, DateCreated, ModifiedByUserId, DateModified) SELECT ProspectId, ContractCodeId, ActivityCodeId, CategoryId, Remarks, Active, CreatedByUserId, DateCreated, ModifiedByUserId, DateModified FROM [Prospecting].[Prospect.Information] WHERE ProspectId = $pid");

			return $data;

		}

		public function ProspectCount($agent){

			$data = sqlsrv_query($this->db, "SELECT COUNT('ProspectId') AS total FROM [Prospecting].[Prospect.Information] WHERE CreatedByUserId = '$agent' AND Deleted != 1");

			return $data;

		}

		public function memberCount($grmId){

			$data = sqlsrv_query($this->db, "SELECT COUNT('AgentId') AS totalmember FROM [DSCS].[Administrative].[Agent.Information] WHERE GRMId = '$grmId' AND Active != 0");

			return $data;

		}

		public function UpdateData($table, $toChange, $value, $field1, $comparison1){

			$data = sqlsrv_query($this->db, "UPDATE $table SET $toChange = $value WHERE $field1 = $comparison1");
			return $data;

		}

	}

?>