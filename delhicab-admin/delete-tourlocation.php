<?php
include('connection.php'); 
if(isset($_GET['delete']))
  
  $delete=$_GET['delete'];
  $delete=mysqli_query($admin_con, "DELETE FROM tour_locations WHERE place_id='$delete'");
  if($delete)
  {
      header("Location:tour-locations.php");
  }
  
?>