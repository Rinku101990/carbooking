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
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="panel panel-yellow">
                            
                            <div class="panel-body">
							<?php if(isset($_GET['msg'])) { ?><p style="color: green; font-weight:600"><i class="fa fa-thumbs-up"></i> Vehicle has been added.</p><?php } ?>
                                <form method="post" action="insertvehicle.php" class="form-horizontal" enctype="multipart/form-data">
                                    <fieldset>
                                        <legend>Enter Vehicle Details</legend>
										
										
										
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Vehicle Name</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="vehicle_name" required="" placeholder="Vehicle Name">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-4 control-label"> Price per KM</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="price_km" required="" placeholder="Price per KM">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-4 control-label">Driver Charge per day</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="driver_charges" required="" placeholder="Driver Charges per day">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-4 control-label">Number of Sittings</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="number_sittings" required="" placeholder="Number of Sittings">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-4 control-label">Number of Baggages</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="number_baggages" required="" placeholder="Number of Bags">
                                            </div>
                                        </div>
										
										<div class="form-group has-feedback">
                                            <label class="col-lg-4 control-label">AC</label>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="ac_type" required="">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-4 control-label">Other Information</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="other_info" required="" placeholder="Tolls,Parking and State Permits as per actuals">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-4 control-label">Vehicle Images</label>
                                            <div class="col-lg-8">
                                                <input type="file" class="form-control" name="vehicle_images[]" required="" multiple>
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
                                <h4>Vehicles List</h4></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Vehicle Image</th>
                                                <th>Vehicle Name</th>
                                                <th>Rate</th>
                                                <th>Driver Charges</th>
                                                <th>Sittings</th>
                                                <th>Baggages</th>
                                                <th>AC</th>
                                                <th>Other Info</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
											<?php $all_cats= "SELECT * from vehicles order by vehicle_name";
											$run_query=mysqli_query($admin_con, $all_cats);
											$i=1;
											 while($result=mysqli_fetch_array($run_query)){
											?>
                                            <tr>
                                                <td><?php echo $i; ?>.</td>
                                                <td><img class="img-responsive" style="width:100px;" src="img/vehicles/<?php $img=explode(',', $result['vehicle_images']);echo $img[0];?>" alt="" /></td>
                                                <td><?php echo $result['vehicle_name'];?></td>
                                                <td><?php echo "Rs. ".$result['price_km']."/km";?></td>
                                                <td><?php echo "Rs. ".$result['driver_charges']."/day";?></td>
                                                <td><?php echo $result['number_sittings']; ?></td>
                                                <td><?php echo $result['number_baggages']; ?></td>
                                                <td><?php echo $result['ac_type']; ?></td>
                                                <td><?php echo $result['other_info']; ?></td>
                                                <td><?php echo $result['status']?></td>
                                                
                                                <td><a href="delete-vehicle.php?delete=<?php echo $result['vehicle_id']?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                                        <a type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </a></td>
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