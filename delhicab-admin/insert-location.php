<?php 
include('connection.php');

	$title=$_POST['title'];
	$city=$_POST['city'];
	$about=$_POST['about'];
	
	    $filename = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($temp_name, "img/locations/".$filename);
		
	$q="INSERT INTO tour_locations (title, city, about, image, status) values ('$title', '$city', '$about', '$filename', 'Active')";
	$run=mysqli_query($admin_con, $q);
	if($run)
	{
		$msg="success";
		header("Location:tour-locations.php?msg=".$msg);
	}


?>