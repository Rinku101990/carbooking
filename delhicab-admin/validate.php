<?php 
include('connection.php');

if(isset($_POST['Sign']))
	{
		$username=$_POST['username'];
		
		$password=$_POST['password'];
		
		$insert_query="SELECT * FROM admin_carbooking where cbadmin_username='$username' AND cbaddmin_password='$password'";
		
		$run_query=mysqli_query($admin_con, $insert_query);
		$row_validate=mysqli_fetch_array($run_query);
		
		if(mysqli_num_rows($run_query))
			{
				
				    session_start();
					$_SESSION['userID'] = $row_validate['cbadmin_id'];
					header("Location: dashboard.php");
				    exit();
				
			}
		else
			{
				$msg='fail';
			    header("Location: index.php?msg=".$msg);
			    exit();
				
			}
	}

else 
	{
		header("location:av-admin/");
	}
?>
