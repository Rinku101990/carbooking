<?php 
include('connection.php');
if(isset($_POST['add']))
{
	$category=$_POST['category'];
		
	$q="INSERT INTO categories (av_cat) values ('$category')";
	$run=mysqli_query($admin_con, $q);
	if($run)
	{
		header("Location:categories.php");
	}
}

?>