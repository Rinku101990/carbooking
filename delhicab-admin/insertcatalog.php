<?php 
include('connection.php');

	$triptype=$_POST['triptype'];
	$tripname=$_POST['tripname'];
	$vehicle=implode(', ', $_POST['vehicles']);
	
	$q="INSERT INTO catalog (triptype_id, trip_id, vehicle_id, status) values ('$triptype', '$tripname', '$vehicle', 'Active')";
	$run=mysqli_query($admin_con, $q);
	if($run)
	{
		$msg="success";
		header("Location:catalog.php?msg=".$msg);
	}


?>