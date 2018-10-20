<?php
include('connection.php'); 
if(isset($_GET['delete']))
  
  $delete=$_GET['delete'];
  $delete=mysqli_query($admin_con, "DELETE FROM triptypes WHERE triptype_id='$delete'");
  if($delete)
  {
      header("Location:triptypes.php");
  }
  
?>