<?php 
include('connection.php');
	
	//print_r($_POST);
	$triptypename_one = $_POST['triptypename_one'];
	$tripname_one =$_POST['tripname_one'];
	$tripstart_one =$_POST['tripstart_one'];
	$tripdest_one =$_POST['tripdest_one'];
	$tripprice_one =$_POST['trip_price'];
	$triptitle_one =$_POST['triptitle_one'];
	$tripdescription_one =$_POST['tripdescription_one'];
	$tripkeywords_one =$_POST['tripkeywords_one'];
	$abouttrip_one =$_POST['abouttrip_one'];
	$vehicle_one =implode(', ', $_POST['vehicles_one']);
	
	
	$filename_one  = $_FILES['tripimage']['name'];
    $temp_name_one  = $_FILES['tripimage']['tmp_name'];

    move_uploaded_file($temp_name_one , "img/tours/".$filename_one );
		
	$q="INSERT INTO trips (trip_name, trip_from, trip_end, trip_price, tripimage, abouttrip,triptype_name, vehicle_id, status, title, description, keywords) values ('$tripname_one', '$tripstart_one', '$tripdest_one', '$tripprice_one', '$filename_one', '$abouttrip_one','$triptypename_one', '$vehicle_one', 'Active', '$triptitle_one', '$tripdescription_one', '$tripkeywords_one')";
	
	$run=mysqli_query($admin_con, $q);
	//echo $run;
	if($run)
	{
		$msg="success";
		header("location:one_way.php?msg=".$msg);
	}


?>