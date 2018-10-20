<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sunrise Admin Panel">
    <meta name="keywords" content="">
    <meta name="author" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="img/icons.png">
    <title>Delhi Car Booking</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/animate.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
    <link href="fonts/font-awesome.min.css" rel="stylesheet">
    <link href="fonts/icomoon/icomoon.css" rel="stylesheet">
    
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />
	
  
</head>

<body class="pink">
    <div class="vertical-nav">
        <div class="logo">
            <h2><a href="http://avfashiongroup.in/av-admin" style="color:white">Car Booking</a></h2>
        </div>
        <div class="user-info">
            <div class="user-img"><img src="img/logo.png" alt="User Info"> </div>
            <h5 class="user-name-o">Delhi Car Booking</h5>
            <p class="profile-complete">Delhi car booking admin</p>
        </div>
       <ul class="menu clearfix">
            
           <li><a href="dashboard.php"><i class="fa icon-dashboard"></i> <span class="menu-item">Dashboard</span></a></li>
           <li><a href="categories.php"><i class="fa fa-list"></i> <span class="menu-item">Categories</span></a></li>
			 <li><a href="#"><i class="fa fa-users"></i> <span class="menu-item">Registrations</span> <span class="down-arrow"></span></a>
                <ul>
                     <ul>
				<?php $all_cats1= "SELECT * from categories";
								$run_query1=mysqli_query($admin_con, $all_cats1);
								 while($result1=mysqli_fetch_array($run_query1)){
								     
								?>
                    <li><a href="registrations.php?av_catid=<?php echo $result1['av_catid']?>"><?php echo $result1['av_cat']?></a></li>
                    
								 <?php }?>
                </ul>
                   
                </ul>
            </li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span class="menu-item">Logout</span></a></li>
        </ul>
    </div>