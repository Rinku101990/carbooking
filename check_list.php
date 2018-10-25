<?php

	include('delhicab-admin/connection.php');
	//print_r($_POST);
	if(isset($_POST)){
		$tripid = $_POST['trip_id'];
		//echo $vhclid;
		$select = "SELECT * FROM rate_list WHERE triptype_id='".$tripid."'";
		//echo $select;
		$result = mysqli_query($admin_con, $select);
		$count = mysqli_num_rows($result);
		if($count > 0){
			$record['locInfo'] = mysqli_fetch_array($result);
			echo json_encode($record);
		}
		
	}
	
?>