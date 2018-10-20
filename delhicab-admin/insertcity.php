<?php 
include('connection.php');

	$cityname=$_POST['cityname'];
	$citycode=$_POST['citycode'];
		
	$q="INSERT INTO locations (city_name, city_code) values ('$cityname', '$citycode')";
	$run=mysqli_query($admin_con, $q);
	if($run)
	{
		$msg="success";
		header("Location:locations.php?msg=".$msg);
	}


?>