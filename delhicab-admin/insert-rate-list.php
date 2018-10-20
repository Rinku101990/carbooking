<?php 
include('connection.php');
	$from_loc=$_POST['from_loc'];
	$to_loc=$_POST['to_loc'];
	$pricesudan=$_POST['pricesudan'];
	$pricesuv=$_POST['pricesuv'];
	
	$q="INSERT INTO rate_list (from_loc, to_loc, pricesudan, pricesuv) values ('$from_loc', '$to_loc', '$pricesudan', '$pricesuv')";
	$run=mysqli_query($admin_con, $q);
	if($run)
	{
		$msg="success";
		header("Location:rate-list.php?msg=".$msg);
	}


?>