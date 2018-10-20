<?php 
	include('delhicab-admin/connection.php');

	$booking_from=$_POST['booking_from'];
	$booking_to=$_POST['booking_to'];
	$pick_date=$_POST['pick_date'];
	$drop_date=$_POST['drop_date'];
	$trip_type=$_POST['trip_type'];
	$vehicle_name=$_POST['vehicle_name'];
	$total_charges=$_POST['total_charges'];
	$Customer_type=$_POST['Customer_type'];
	$customer_name=$_POST['customer_name'];
	$customer_email=$_POST['customer_email'];
	$customer_phone=$_POST['customer_phone'];
	$customer_address=$_POST['customer_address'];
	$additional=$_POST['additional'];

	$booking_number = substr(uniqid('DCB'),0,7);
		
	$q = "INSERT INTO booking_details (customer_name, Customer_type, customer_email, customer_phone, customer_address, additional, booking_from, booking_to, pick_date, drop_date, trip_type, vehicle_name, total_charges, payment_status, transaction_number, booking_status, booking_date, booking_number) values ('$customer_name', '$Customer_type', '$customer_email', '$customer_phone', '$customer_address', '$additional', '$booking_from', '$booking_to', '$pick_date', '$drop_date', '$trip_type', '$vehicle_name', '$total_charges', 'Pending', 'Pending', 'Pending', NOW(), '$booking_number')";
	$run=mysqli_query($admin_con, $q);
	if($run)
	{
		$msg=$booking_number;
		header("Location:thank-you.php?msg=".$msg);
	}


?>