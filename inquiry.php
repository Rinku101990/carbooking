<?php 
include('delhicab-admin/connection.php');
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$country=$_POST['country'];
	$message=$_POST['message'];
	
		
	$q="INSERT INTO inquiries (name, email, mobile, address, city, country, message, inquiry_date) values ('$name', '$email', '$mobile', '$address', '$city', '$country', '$message', NOW())";
	$run=mysqli_query($admin_con, $q);
	if($run)
	{
		$msg="success";
		header("Location:contact-us.php?msg=".$msg);
	}
?>