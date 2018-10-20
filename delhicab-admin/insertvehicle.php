<?php 
include('connection.php');

	$vehicle_name=$_POST['vehicle_name'];
	$price_km=$_POST['price_km'];
	$driver_charges=$_POST['driver_charges'];
	$number_sittings=$_POST['number_sittings'];
	$number_baggages=$_POST['number_baggages'];
	$ac_type=$_POST['ac_type'];
	$other_info=$_POST['other_info'];
	
	$total = count($_FILES['vehicle_images']['name']);
	
    for($i=0; $i<$total; $i++) {
      $tmpFilePath = $_FILES['vehicle_images']['tmp_name'][$i];
      if ($tmpFilePath != ""){
        $filename[] = $_FILES['vehicle_images']['name'][$i];
        $newFilePath = "img/vehicles/".$_FILES['vehicle_images']['name'][$i];
        move_uploaded_file($tmpFilePath, $newFilePath);
      }
    }
	$vehicle_images = implode(',',$filename);
		
	$q="INSERT INTO vehicles (vehicle_name, price_km, driver_charges, number_sittings, number_baggages, ac_type, other_info, vehicle_images, status) values ('$vehicle_name', '$price_km', '$driver_charges', '$number_sittings', '$number_baggages', '$ac_type', '$other_info', '$vehicle_images', 'Active')";
	$run=mysqli_query($admin_con, $q);
	if($run)
	{
		$msg="success";
		header("Location:vehicles.php?msg=".$msg);
	}


?>