
<?php 
session_start();
 include('connection.php');
 if(!isset($_SESSION['userID'])) // If session is not set then redirect to Login Page
       {
           header("Location:index.php");  
       }
	   if(isset($_GET['av_catid']))
		   $av_catid=$_GET['av_catid'];
		   
?>
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
    <title>AV Fashion Group Admin Panel Dashboard</title>
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
            <h2><a href="" style="color:white">AV Fashion Group</a></h2>
        </div>
        <div class="user-info">
            <div class="user-img"><img src="img/logo.jpeg" alt="User Info"> <span class="likes-info">26</span></div>
            <h5 class="user-name-o">Av Fashion Group</h5>
            <p class="profile-complete">Group of fashion shows</p>
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
    <div class="dashboard-wrapper dashboard-wrapper-lg">
       
        <div class="top-bar clearfix">
            <div class="page-title">
                <h4>Category Registrations</h4></div>
           
        </div>
        <div class="main-container">
            <div class="container-fluid">
                <div class="row gutter">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h4>Category Registrations List</h4></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-condensed table-bordered no-margin file-export">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Contact Number</th>
                                                <th>Email Id</th>
                                                <th>Age</th>
                                                <th>City</th>
                                                <th>Register date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
										<?php $all_cats= "SELECT * from members where av_catid ='$av_catid' ORDER BY register_date DESC";
								$run_query=mysqli_query($admin_con, $all_cats);
								$i=1;
								 while($result=mysqli_fetch_array($run_query)){
								     
								?>
                                            <tr>
                                                <td><?php echo $i; ?>.</td>
                                                <td><?php echo $result['av_name']?></td>
                                                <td><?php echo $result['av_phone']?></td>
                                                <td><?php echo $result['av_email']?></td>
                                                <td><?php echo $result['av_age']?></td>
                                                <td><?php echo $result['av_city']?></td>
                                                <td><?php echo $date=date('d-m-Y', strtotime($result['register_date']));?></td>
                                                <td><a href="delete-member.php?av_id=<?php echo $result['av_id']?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
                                            </tr>
								 <?php $i++;} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <footer>Copyrights © 2018 AV Fashion Group. All rights reserved.</footer>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sparkline.js"></script>
    <script src="js/scrollup/jquery.scrollUp.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	
	
	
	
	
	
	
	
	
	<script>$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );</script>
</body>

</html>