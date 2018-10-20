<?php 
include('connection.php');

	$tripname=$_POST['tripname'];
	$tripstart=$_POST['tripstart'];
	$tripdest=$_POST['tripdest'];
	$tripdictance=$_POST['tripdictance'];
	$triptitle=$_POST['triptitle'];
	$tripdescription=$_POST['tripdescription'];
	$tripkeywords=$_POST['tripkeywords'];
	$abouttrip=$_POST['abouttrip'];
	$vehicle=implode(', ', $_POST['vehicles']);
	
	
	$filename = $_FILES['tripimage']['name'];
        $temp_name = $_FILES['tripimage']['tmp_name'];

        move_uploaded_file($temp_name, "img/tours/".$filename);
		
	$q="INSERT INTO trips (trip_name, trip_from, trip_end, distance, tripimage, abouttrip, vehicle_id, status, title, description, keywords) values ('$tripname', '$tripstart', '$tripdest', '$tripdictance', '$filename', '$abouttrip', '$vehicle', 'Active', '$triptitle', '$tripdescription', '$tripkeywords')";
	$run=mysqli_query($admin_con, $q);
	if($run)
	{
		$msg="success";
		header("Location:trips.php?msg=".$msg);
	}


?>