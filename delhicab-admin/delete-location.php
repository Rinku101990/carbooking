<?php
include('connection.php'); 
if(isset($_GET['delete']))
  
  $delete=$_GET['delete'];
  $delete=mysqli_query($admin_con, "DELETE FROM locations WHERE city_id='$delete'");
  if($delete)
  {
      header("Location:locations.php");
  }
  
?>