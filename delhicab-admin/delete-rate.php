<?php
include('connection.php'); 
if(isset($_GET['delete']))
  
  $delete=$_GET['delete'];
  $delete=mysqli_query($admin_con, "DELETE FROM rate_list WHERE rate_id='$delete'");
  if($delete)
  {
      header("Location:rate-list.php");
  }
  
?>