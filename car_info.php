<?php

	include('delhicab-admin/connection.php');
	//print_r($_POST);
	if(isset($_POST)){
		$vhclid = $_POST['tripid'];
		//echo $vhclid;
		$select = "SELECT * FROM vehicles WHERE vehicle_id='".$vhclid."'";
		$result = mysqli_query($admin_con, $select);
		$count = mysqli_num_rows($result);
		if($count > 0){
			$record['carInfo'] = mysqli_fetch_array($result);
			echo json_encode($record);
		}
		
	}
	
?>