<?php
include('connection.php'); 
if(isset($_GET['av_id']))
  
  $delete=$_GET['av_id'];
  $delete=mysqli_query($admin_con, "DELETE FROM members WHERE av_id='$delete'");
  if($delete)
  {
      header("Location:dashboard.php");
  }
  
?>