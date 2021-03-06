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
    <title>Delhi Car Booking | Trips</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/animate.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/datepicker/daterangepicker-bs3.css">
     <link href="fonts/icomoon/icomoon.css" rel="stylesheet" />

    <!-- Wysiwyg CSS -->
    <link href="css/wysiwyg-editor/editor.css" rel="stylesheet" />
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
                                                <th>Customer Name</th>
                                                <th>Email Id</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Message</th>
                                                <th>Booking From</th>
                                                <th>Booking to</th>
                                                <th>Pick Up date</th>
                                                <th>Drop date</th>
                                                <th>Trip Type</th>
                                                <th>Vehicle</th>
                                                <th>Charges</th>
                                                <th>Transaction Number</th>
                                                <th>Payment Status</th>
                                                <th>Booking Status</th>
                                                <th>Booking Date</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
											<?php $all_cats= "SELECT * from booking_details order by booking_date";
											$run_query=mysqli_query($admin_con, $all_cats);
											$i=1;
											 while($result=mysqli_fetch_array($run_query)){
											?>
                                            <tr>
                                                <td><?php echo $i; ?>.</td>
                                                <td><?php echo $result['Customer_type'].". ".$result['customer_name'];?></td>
                                                <td><?php echo $result['customer_email']?></td>
                                                <td><?php echo $result['customer_phone']?></td>
                                                <td><?php echo $result['customer_address']?></td>
                                                <td><?php echo $result['additional']?></td>
                                                <td><?php echo $result['booking_from']?></td>
                                                <td><?php echo $result['booking_to']?></td>
                                                <td><?php echo $result['pick_date']?></td>
                                                <td><?php echo $result['drop_date']?></td>
                                                <td><?php echo $result['trip_type']?></td>
                                                <td><?php echo $result['vehicle_name']; ?></td>
                                                <td>Rs. <?php echo number_format($result['total_charges']); ?></td>
                                                
                                                <td>
                                                    <?php if($result['booking_transection_id']!=''){ ?>
                                                        <?php echo $result['booking_transection_id']; ?>
                                                    <?php }else{ ?>
                                                    <?php } ?>
                                                    
                                                </td>
                                                
                                                <td>
                                                    <?php if($result['booking_payment_status']=="TXN_SUCCESS"){ ?>
                                                        <span class="label green-bg hidden-md">success</span>
                                                    <?php }else if($result['booking_payment_status']=="TXN_FAILURE"){ ?>
                                                        <span class="label red-bg hidden-md">failure</span>
                                                    <?php }else if($result['booking_payment_status']=="PENDING"){ ?>
                                                        <span class="label warning-bg hidden-md">pending</span>
                                                    <?php }else{ ?>
                                                    <?php } ?>
                                                    
                                                </td>
                                                <td>
                                                    <?php if($result['booking_payment_status']=="TXN_SUCCESS"){ ?>
                                                        <span class="label green-bg hidden-md">success</span>
                                                    <?php }else if($result['booking_payment_status']=="PENDING"){ ?>
                                                        <span class="label warning-bg hidden-md">pending</span>
                                                    <?php }else{ ?>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $result['booking_date']?></td>
                                                
                                                <td><a href="delete-booking.php?delete=<?php echo $result['booking_id']?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
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
	
	<script src="js/flot/jquery.flot.html"></script>
    <script src="js/flot/jquery.flot.pie.min.js"></script>
    <script src="js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot/jquery.flot.resize.min.js"></script>
	<script src="js/wysiwyg-editor/editor.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#txtEditor").Editor();
        });
    </script>
</body>

</html>