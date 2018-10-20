

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Delhi Car Booking Services Noida | Booking</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <!-- CSS Global -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/plugins/owl-carousel2/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/plugins/owl-carousel2/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/plugins/animate/animate.min.css" rel="stylesheet">
    <link href="assets/plugins/swiper/css/swiper.min.css" rel="stylesheet">

    <link href="assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="assets/plugins/countdown/jquery.countdown.css" rel="stylesheet">
    <link href="assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="assets/css/theme.css" rel="stylesheet">
    <link href="assets/css/theme-red-1.css" rel="stylesheet" id="theme-config-link">

    <!-- Head Libs -->
    <script src="assets/plugins/modernizr.custom.js"></script>
</head>
<body id="home" class="wide">
<!-- PRELOADER -->
<div id="preloader">
    <div id="preloader-status">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div id="preloader-title">Loading</div>
    </div>
</div>
<!-- /PRELOADER -->
<!-- WRAPPER -->
<div class="wrapper">
   <?php include('header.php');?>
    <!-- CONTENT AREA -->
    <div class="content-area">
        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs text-right" style="background-image: url(assets/img/Background.png);">
            <div class="container">
                <div class="page-header">
                    <h1>Our Car Listing</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Car Booking List</li>
                </ul>
            </div>
        </section>

        <section class="page-section with-sidebar sub-page">
            <div class="container">
                <div class="row">
                    <!-- CONTENT -->
                    <div class="col-md-9 content car-listing" id="content">

							<!-- Car Listing -->
					 <?php 

                    include('delhicab-admin/connection.php');
                    if(isset($_GET)){
                        $piclocation = $_GET['tripup'];
                        $droplocation = $_GET['tridrop'];

                        $cars = "SELECT * FROM trips WHERE trip_from='$piclocation' AND trip_end='$droplocation'";
                        $runtrips = mysqli_query($admin_con, $cars);

                        $checkData = mysqli_num_rows($runtrips);

                        if($checkData > 0){

                        // GET TRIP RECORD IF RESULT FOUND //
                        $results = mysqli_fetch_array($runtrips);

                        $distance = $results['distance'];
                        $tripid = $results['trip_id'];

                        $vehicle_id=explode(',', $results['vehicle_id']);

                        $count=count($vehicle_id);
    					 for($i=0; $i<$count;$i++){
    						 $vehicle=$vehicle_id[$i];
    						$all_cats= "SELECT * from vehicles where vehicle_id='$vehicle' order by price_km";
    						$run_query=mysqli_query($admin_con, $all_cats);
    						$result = mysqli_fetch_array($run_query);
						 
					 ?>
                        <div class="thumbnail no-border no-padding thumbnail-car-card clearfix">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="delhicab-admin/img/vehicles/<?php $img=explode(',', $result['vehicle_images']);echo $img[0];?>">
                                    <img class="img-responsive" style="border-right: 1px solid #dedede;width: 375px; height:220px" src="delhicab-admin/img/vehicles/<?php echo $img[0];?>" alt=""/>
                                </a>
                            </div>
                            <div class="caption">
                                <h4 class="caption-title"><a href="#"><?php echo $result['vehicle_name'];?></a></h4>
                                <h5 class="caption-title-sub">Rs.<?php echo $result['price_km'];?> / Per KM <span style="float:right"></span></h5>

							   <div class="caption-text">
    							   <div class="col-md-6" style="margin-top:0px;"><strong>Total Distance:</strong><br />
    							     <strong>Driver Charges:</strong> <br />
    							   </div>
    							   <div class="col-md-6"  style="margin-top:0px;">
                                        <?php echo $distance." Km";?> <br />
                                        Rs. <?php echo $result['driver_charges']." / Per Day";?><br />
    							   </div>
								</div>
								
								
                                <table class="table">
                                    <tr>
                                        <td title="Number of Sittings"><i class="fa fa-wheelchair"></i> <?php echo $result['number_sittings'];?></td>
                                        <td title="Number of Baggages"><i class="fa fa-suitcase"></i> <?php echo $result['number_baggages'];?></td>
                                        <td title="AC"><i class="fa fa-cog"></i> <?php echo $result['ac_type'];?></td>
                                        <td class="button">
										<button type="button" class="btn btn-small btn-theme viewTripInfo" viewTripInfo="<?php echo $result['vehicle_id'];?>">Book Now</button>
										</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
					
					<?php } } }else{ ?>
                        
                    <?php } ?>

                    </div>
                    <!-- /CONTENT -->

                    <!-- SIDEBAR -->
                    <aside class="col-md-3 sidebar" id="sidebar">
                        <!-- widget -->
                        <div class="widget shadow widget-find-car">
                            <h4 class="widget-title">Find Best Rental Car</h4>
                            <div class="widget-content">
                                <!-- Search form -->
                                <div class="form-search light">
                                    <form action="delhi-cab-booking.php" method="post">
										
										<div class="form-group selectpicker-wrapper">
                                            <label>Select Trip Type</label>
                                            <select name="triptype" class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                    data-toggle="tooltip" title="Select" required>
                                                <option>Select Category</option>
                                                <?php $all_cats= "SELECT * from triptypes order by triptype_name";
																	$run_query=mysqli_query($admin_con, $all_cats);
																	while($result=mysqli_fetch_array($run_query)){
																			?>
																		<option value="<?php echo $result['triptype_name']?>"><?php echo $result['triptype_name']?></option>
											                        
												<?php } ?>
                                            </select>
                                        </div>
										
										<div class="form-group selectpicker-wrapper">
                                            <label>Picking Up Location</label>
                                            <select name="piclocation"  class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                    data-toggle="tooltip" title="Select" required>
                                                <option value="">Select City</option>
																		<?php $all_catss= "SELECT * from locations order by city_name";
											$run_querys=mysqli_query($admin_con, $all_catss);
											 while($results=mysqli_fetch_array($run_querys)){
											?>
																		<option value="<?php echo $results['city_name']?>"><?php echo $results['city_name']?></option>
											 <?php } ?>
                                            </select>
                                        </div>
										<div class="form-group selectpicker-wrapper">
                                            <label>Dropping Off Location</label>
                                            <select name="droplocation"  class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                    data-toggle="tooltip" title="Select" required>
                                                <option value="">Select City</option>
																		<?php $all_catsss= "SELECT * from locations order by city_name";
											$run_queryss=mysqli_query($admin_con, $all_catsss);
											 while($resultss=mysqli_fetch_array($run_queryss)){
											?>
																		<option value="<?php echo $resultss['city_name']?>"><?php echo $resultss['city_name']?></option>
											 <?php } ?>
                                            </select>
                                        </div>
										
                                        <div class="form-group has-icon has-label">
                                            <label for="formSearchUpDate3">Picking Up Date</label>
                                            <input name="picdate" type="text" class="form-control" id="formSearchUpDate3" placeholder="dd/mm/yyyy" required>
                                            <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                                        </div>

											 <div class="form-group has-icon has-label">
                                            <label for="formSearchUpDate2">Dropping off Date</label>
                                            <input name="dropdate" type="text" class="form-control" id="formSearchUpDate2" placeholder="dd/mm/yyyy" required>
                                            <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                                        </div>

                                        <button type="submit" id="formSearchSubmit3" class="btn btn-submit btn-theme btn-theme-dark btn-block">Find Car</button>

                                    </form>
                                </div>
                                <!-- /Search form -->
                            </div>
                        </div>
                        
                        <!-- /widget testimonials -->
                        <!-- widget helping center -->
                        <div class="widget shadow widget-helping-center">
                            <h4 class="widget-title">Helping Center</h4>
                            <div class="widget-content">
                                <p>Fro any kind of inquiry or for support call us on the given number. You can directly book our services with help of phone and email also.</p>
                                <h5 class="widget-title-sub">+91 753-298-1416</h5>
                                <p><a href="mailto:info@delhicarbooking.in">Email: info@delhicarbooking.in</a></p>
                                <div class="button">
                                    <a href="contact-us.php" class="btn btn-block btn-theme btn-theme-dark">Support Center</a>
                                </div>
                            </div>
                        </div>
                        <!-- /widget helping center -->
                    </aside>
                    <!-- /SIDEBAR -->

                </div>
            </div>
        </section>
        <!-- /PAGE WITH SIDEBAR -->
        <?php include('footer.php');?>
        <!-- /PAGE -->

    </div>

<!-- Modal -->
<div id="myCarinfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Car Booking Info</h4>
      </div>
      <div class="modal-body">
        <form action="delhi-cab-booking.php" method="post">
            <div class="row row-inputs">
                <div class="container-fluid">
                    <div class="col-sm-12">
                        <div class="form-group has-icon has-label">
                            <label for="formSearchUpLocation3">Trip Type</label>
                            <select name="triptype" class="form-control" id="formSearchUpLocation3" required>
                            <option value="">Select Trip Type</option>
                            <?php $all_cats= "SELECT * from triptypes order by triptype_name";
                                $run_query=mysqli_query($admin_con, $all_cats);
                                while($result=mysqli_fetch_array($run_query)){
                            ?>
                            <option value="<?php echo $result['triptype_name']?>"><?php echo $result['triptype_name']?></option>
                            <?php }?>
                            </select>
                            <span class="form-control-icon"><i class="fa fa-location-arrow"></i></span>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group has-icon has-label">
                            <label for="toSearchUpLocation3">Picking Up Location</label>
                            <input type="text" name="piclocation" id="piclocation" value="<?php echo $piclocation;?>" class="form-control" readonly="readonly">
                            <span class="form-control-icon"><i class="fa fa-location-arrow"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                         <div class="form-group has-icon has-label">
                            <label for="dropSearchUpLocation3">Drop Location</label>
                            <input type="text" name="droplocation" id="droplocation" value="<?php echo $droplocation;?>" class="form-control" readonly="readonly">
                            <span class="form-control-icon"><i class="fa fa-location-arrow"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group has-icon has-label">
                            <label for="formSearchUpDate3">Picking Up Date</label>
                            <input name="picdate" type="date" class="form-control" id="formSearchUpDate3" placeholder="dd/mm/yyyy" required>
                            <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-6"">
                        <div class="form-group has-icon has-label">
                            <label for="formSearchUpDate2">Dropping off Date</label>
                            <input name="dropdate" type="date" class="form-control" id="formSearchUpDate2" placeholder="dd/mm/yyyy" required>
                            <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row row-submit">
                <div class="container-fluid">
                    <div class="inner">
                        <button type="submit" id="formSearchSubmit3" class="btn btn-submit btn-theme pull-right">Find Car</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!-- /CONTENT AREA -->
 <footer class="footer">
        <div class="footer-meta">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="btn-row text-center">
                            <a href="#" class="btn btn-theme btn-icon-left facebook"><i class="fa fa-facebook"></i>FACEBOOK</a>
                            <a href="#" class="btn btn-theme btn-icon-left twitter"><i class="fa fa-twitter"></i>TWITTER</a>
                            <a href="#" class="btn btn-theme btn-icon-left pinterest"><i class="fa fa-pinterest"></i>PINTEREST</a>
                            <a href="#" class="btn btn-theme btn-icon-left google"><i class="fa fa-google"></i>GOOGLE</a>
                        </p>
                        <div class="copyright">&copy; 2018 Aaradhya Tour and Travels — Designed By <a title="Website Design Company" target="_blank" href="www.ordiusits.com">Ordius IT Solutions</a></div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>
</div>
<!-- /WRAPPER -->

<!-- JS Global -->
<script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="assets/plugins/superfish/js/superfish.min.js"></script>
<script src="assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
<script src="assets/plugins/owl-carousel2/owl.carousel.min.js"></script>
<script src="assets/plugins/jquery.sticky.min.js"></script>
<script src="assets/plugins/jquery.easing.min.js"></script>
<script src="assets/plugins/jquery.smoothscroll.min.js"></script>
<!--<script src="assets/plugins/smooth-scrollbar.min.js"></script>-->
<script src="assets/plugins/swiper/js/swiper.jquery.min.js"></script>
<script src="assets/plugins/datetimepicker/js/moment-with-locales.min.js"></script>
<script src="assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- JS Page Level -->
<script src="assets/js/theme-ajax-mail.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/isotope/jquery.isotope.min.js"></script>
<script src="assets/js/theme.js"></script>

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/plugins/jquery.cookie.js"></script>
<script>
$(document).ready(function(){
    $(".viewTripInfo").click(function(){
        var tripid = $(this).attr("viewTripInfo");
        $.ajax({
            method:"post",
            url:"car_info.php",
            data:{tripid:tripid},
            dataType:"json",
            success:function(data){
                $("#myCarinfo").modal();

            }
        });
    });
});
</script>
<!--<![endif]-->

</body>
</html>