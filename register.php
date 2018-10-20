<?php 
include('av-admin/connection.php');

	$av_phone=$_POST['av_phone'];
	$av_name=$_POST['av_name'];
	$av_email=$_POST['av_email'];
	$av_age=$_POST['av_age'];
	$av_city=$_POST['av_city'];
	$av_catid=$_POST['av_catid'];
	
	$select_phone="select*from members where av_phone='$av_phone'";
	$run_phone=mysqli_query($admin_con, $select_phone);
	$rows=mysqli_num_rows($run_phone);
	
	if($rows>0){
	
		$mobile='available';
		header("Location:enroll.php?mobile=".$mobile);
	} 
	else{
	    $q="INSERT INTO members (av_name, av_phone, av_email, av_age, av_city, av_catid, register_date) values ('$av_name', '$av_phone', '$av_email', '$av_age', '$av_city', '$av_catid', NOW())";
	    $run=mysqli_query($admin_con, $q);
       $msg='success';
		header("Location:enroll.php?status=".$msg);
	}
?>