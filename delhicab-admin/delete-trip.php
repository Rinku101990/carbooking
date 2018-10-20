<?php
include('connection.php'); 
if(isset($_GET['delete']))
  
  $delete=$_GET['delete'];
  $delete=mysqli_query($admin_con, "DELETE FROM trips WHERE trip_id='$delete'");
  if($delete)
  {
      header("Location:trips.php");
  }
  
?>