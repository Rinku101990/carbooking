<?php 
session_start();

 include('connection.php');
 if(!isset($_SESSION['userID'])) // If session is not set then redirect to Login Page
       {
           header("Location:index.php");  
       }
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
    <link rel="shortcut icon" href="img/logo.png">
    <title>Delhi Car Booking | Vehicles</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/animate.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/datepicker/daterangepicker-bs3.css">
    <link href="fonts/icomoon/icomoon.css" rel="stylesheet">
	<link rel="stylesheet" href="css/datatables/dataTables.bs.min.css">
    <link rel="stylesheet" href="css/datatables/autoFill.bs.min.css">
    <link rel="stylesheet" href="css/datatables/fixedHeader.bs.css">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
</head>

<body class="blue">
    <?php include('navbar.php');?>
    <div class="dashboard-wrapper dashboard-wrapper-lg">
        <?php include('topbar.php');?>
        
        <div class="main-container">
            <div class="container-fluid">
                
               
                <div class="row gutter">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="panel panel-yellow">
                            
                            <div class="panel-body">
							<?php if(isset($_GET['msg'])) { ?><p style="color: green; font-weight:600"><i class="fa fa-thumbs-up"></i> Catalog has been added.</p><?php } ?>
                                <form method="post" action="insertcatalog.php" class="form-horizontal">
                                    <fieldset>
                                        <legend>Assign Trips and Vehicles</legend>
										<div class="form-group has-feedback">
                                            <label class="col-lg-4 control-label">Trip Type</label>
                                            <div class="col-lg-8">
                                                 <select class="form-control" name="triptype" required="">
                                                    <option>-- Select Trip Type --</option>
													<?php $all_catsss= "SELECT * from triptypes order by triptype_name";
											$run_queryss=mysqli_query($admin_con, $all_catsss);
											
											 while($resultss=mysqli_fetch_array($run_queryss)){
											?>
                                                    <option value="<?php echo $resultss['triptype_id']?>"><?php echo $resultss['triptype_name']?></option>
                                                     <?php } ?>
                                                </select>
                                            </div>
                                        </div>
										
										<div class="form-group has-feedback">
                                            <label class="col-lg-4 control-label">Trip</label>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="tripname" required="">
                                                    <option>-- Select a Trip --</option>
													<?php $all_catsa= "SELECT * from trips order by trip_name";
											$run_querya=mysqli_query($admin_con, $all_catsa);
											$i=1;
											 while($resulta=mysqli_fetch_array($run_querya)){
											?>
                                                    <option value="<?php echo $resulta['trip_id']?>"><?php echo $resulta['trip_name']?></option>
                                                     <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                       
										<div class="form-group has-feedback">
                                            <label class="col-lg-4 control-label">Assign Vehicles</label>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="vehicles[]" required="" multiple>
													<?php $all_catsz= "SELECT * from vehicles order by vehicle_name";
											$run_queryz=mysqli_query($admin_con, $all_catsz);
										
											 while($resultz=mysqli_fetch_array($run_queryz)){
											?>
                                                    <option value="<?php echo $resultz['vehicle_id']?>"><?php echo $resultz['vehicle_name']?></option>
                                                     <?php } ?>
                                                </select>
                                            </div>
                                        </div>
										
										
                                        <div class="form-group">
                                        <div class="col-lg-6 col-lg-offset-6">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                    </fieldset>
                                    
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
				
				<div class="row gutter">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h4>Trip Categories</h4></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Trip Type</th>
                                                <th>Trip Name</th>
                                                <th>Vehicle</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
											<?php $all_cats2= "SELECT * from catalog";
											$run_query2=mysqli_query($admin_con, $all_cats2);
											$j=1;
											 while($result2=mysqli_fetch_array($run_query2)){
											?>
                                            <tr>
                                                <td><?php echo $j; ?>.</td>
                                                <td><?php 
												$triptype_id=$result2['triptype_id'];
												$all_types= "SELECT * from triptypes where triptype_id='$triptype_id'";
											$run_types=mysqli_query($admin_con, $all_types);
											 $result_types=mysqli_fetch_array($run_types);
											
												
												
												echo $result_types['triptype_name']?></td>
                                                <td><?php 
												$trip_id=$result2['trip_id'];
												$all_trips= "SELECT * from trips where trip_id='$trip_id'";
											$run_trips=mysqli_query($admin_con, $all_trips);
											 $result_trips=mysqli_fetch_array($run_trips);
											
												
												
												echo $result_trips['trip_name']?></td>
												<td><?php 
												$vehicles=explode(', ', $result2['vehicle_id']);
												$count=count($vehicles);
												for($i=0; $i<$count;$i++){
													$vehicle_id=$vehicles[$i];
												$all_vehicle= "SELECT * from vehicles where vehicle_id='$vehicle_id'";
											$run_vehicle=mysqli_query($admin_con, $all_vehicle);
											 $result_vehicle=mysqli_fetch_array($run_vehicle);
											
												
												
												echo $result_vehicle['vehicle_name'].", ";
												
												
												}?></td>
												
												
                                                <td><?php echo $result2['status'];?></td>
                                                
                                                
                                                <td><a href="delete-catalog.php?delete=<?php echo $result2['catalog_id']?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                                        <a type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </a></td>
                                            </tr>
                                            <?php $j++;} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				
				
				
				
				
            </div>
        </div>
        <footer>Copyright Sunrise Admin <span>2016</span>.</footer>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sparkline.js"></script>
    <script src="js/daterange/moment.js"></script>
    <script src="js/daterange/daterangepicker.js"></script>
    <script src="js/bsvalidator/bootstrapValidator.js"></script>
    <script src="js/scrollup/jquery.scrollUp.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/custom-forms.js"></script>
    <script src="js/custom-daterange.js"></script>
	<script src="js/datatables/dataTables.min.js"></script>
    <script src="js/datatables/dataTables.bootstrap.min.js"></script>
    <script src="js/datatables/autoFill.min.js"></script>
    <script src="js/datatables/autoFill.bootstrap.min.js"></script>
    <script src="js/datatables/fixedHeader.min.js"></script>
    <script src="js/datatables/custom-datatables.js"></script>
</body>

</html>