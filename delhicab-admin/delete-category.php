<?php
include('connection.php'); 
if(isset($_GET['av_catid']))
  
  $delete=$_GET['av_catid'];
  $delete=mysqli_query($admin_con, "DELETE FROM categories WHERE av_catid='$delete'");
  if($delete)
  {
      header("Location:categories.php");
  }
  
?>