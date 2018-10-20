<?php 
include('connection.php');

	$triptype=$_POST['triptype'];
		
	$q="INSERT INTO triptypes (triptype_name) values ('$triptype')";
	$run=mysqli_query($admin_con, $q);
	if($run)
	{
		$msg="success";
		header("Location:triptypes.php?msg=".$msg);
	}


?>