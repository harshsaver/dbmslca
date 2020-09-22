<?php 

	require_once 'DbConnect.php';
	$response = array();

					if(isTheseParametersAvailable(array('currID'))){

						$currID = $_POST['currID'];
						$currSalary = 0;
						$stmt = $conn->prepare("SELECT salary FROM Emp WHERE empno = ?"); 
							$stmt->bind_param("i",$currID);
							$stmt->execute();
							$stmt->bind_result($currSalary);
							$stmt->fetch();
							$stmt->close();
					

					if (!$mysqli->query("CALL calcTax('$currSalary')")) {
    					echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
    					$response['error'] = true; 
					$response['message'] = 'Fail'; 
					}else{
						$response['error'] = false; 
							$response['message'] = 'Done'; 
					}
					
				
}
				echo json_encode($response);
	
	function isTheseParametersAvailable($params){
		
		foreach($params as $param){
			if(!isset($_POST[$param])){
				return false; 
			}
		}
		return true; 
	}
