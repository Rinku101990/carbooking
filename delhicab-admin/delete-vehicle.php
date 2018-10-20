<?php
include('connection.php'); 
if(isset($_GET['delete']))
  
  $delete=$_GET['delete'];
  $delete=mysqli_query($admin_con, "DELETE FROM vehicles WHERE vehicle_id='$delete'");
  if($delete)
  {
      header("Location:vehicles.php");
  }
  
?>