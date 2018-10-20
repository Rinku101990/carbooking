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
                        <div class="panel panel-yellow">
                            
                            <div class="panel-body">
							<?php if(isset($_GET['msg'])) { ?><p style="color: green; font-weight:600"><i class="fa fa-thumbs-up"></i> Trip has been added.</p><?php } ?>
                                <form method="post" action="insert-location.php" class="form-horizontal" enctype="multipart/form-data">
                                    <fieldset>
                                        <legend>Enter Tour Location</legend>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Tourist Place Title</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="title" required="">
                                            </div>
                                        </div>
										
										<div class="form-group has-feedback">
                                            <label class="col-lg-3 control-label">City</label>
                                            <div class="col-lg-4">
                                                <select class="form-control" name="city" required="">
                                                    <option>-- Select a City --</option>
													<?php $all_cats= "SELECT * from locations order by city_name";
											$run_query=mysqli_query($admin_con, $all_cats);
											$i=1;
											 while($result=mysqli_fetch_array($run_query)){
											?>
                                                    <option value="<?php echo $result['city_name']?>"><?php echo $result['city_name']?></option>
                                                     <?php } ?>
                                                </select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-lg-3 control-label">Image</label>
                                            <div class="col-lg-4">
                                                <input type="file" class="form-control" name="image" required="">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-3 control-label">About Place</label>
                                            <div class="col-lg-6">
                                                <textarea rows="12" class="form-control" name="about"></textarea>
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
                                <h4>Tourist Places</h4></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Place Title</th>
                                                <th>City</th>
                                                <th>About</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
											<?php $all_cats= "SELECT * from tour_locations order by title";
											$run_query=mysqli_query($admin_con, $all_cats);
											$i=1;
											 while($result=mysqli_fetch_array($run_query)){
											?>
                                            <tr>
                                                <td><?php echo $i; ?>.</td>
                                                <td><img style="width:100px" class="img-responsive" src="img/locations/<?php echo $result['image']?>" alt="" /></td>
                                                <td><?php echo $result['title']?></td>
                                                <td><?php echo $result['city']?></td>
                                                <td><?php echo $result['about']?></td>
                                                
                                                <td><a href="delete-tourlocation.php?delete=<?php echo $result['place_id']?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
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