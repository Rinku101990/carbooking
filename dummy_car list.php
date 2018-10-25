<?php 


?>


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
        <!-- /BREADCRUMBS -->

        <!-- PAGE WITH SIDEBAR -->
        <?php 

        include('delhicab-admin/connection.php');

        $triptype = $_POST['triptype'];
        $piclocation = $_POST['piclocation'];
        $droplocation = $_POST['droplocation'];
        $picdate = strtotime($_POST['picdate']);
        $dropdate = strtotime($_POST['dropdate']);
        $datediff = $dropdate-$picdate;
        $days = round($datediff / (60 * 60 * 24))+1;
        $distancebyday = 250*$days;

        $cars = "SELECT * FROM trips WHERE trip_from='$piclocation' AND trip_end='$droplocation' AND triptype_name='$triptype'";
        $runtrips = mysqli_query($admin_con, $cars);

        $checkData = mysqli_num_rows($runtrips);

        if($checkData > 0){ 
            // GET TRIP RECORD IF RESULT FOUND //
            $results = mysqli_fetch_array($runtrips);

            $tripType = $results['triptype_name'];

            $distance = $results['distance'];
        ?>
        <section class="page-section with-sidebar sub-page">
            <div class="container">
                <div class="row">
                    <!-- CONTENT -->
                    <div class="col-md-9 content car-listing" id="content">

							<!-- Car Listing -->
					<?php 

                    if($triptype=='One way'){
                      $billdistance = $distance;
                    }else{
                     $billdistance = $distance*2;
                    }
                    if($distancebyday <= $billdistance){
                     $finaldistance = $billdistance;
                    }else{
                     $finaldistance = $distancebyday;
                    }

                    $vehicle_id=explode(', ', $results['vehicle_id']);
                    $count=count($vehicle_id);

					 for($i=0; $i<$count;$i++){
						 $vehicle=$vehicle_id[$i];
						$all_cats= "SELECT * FROM vehicles WHERE vehicle_id='$vehicle' ORDER BY price_km";

						$run_query=mysqli_query($admin_con, $all_cats);
						$result=mysqli_fetch_array($run_query);

                        if(($tripType)=="Round"){
						 
					 ?>
                        <div class="thumbnail no-border no-padding thumbnail-car-card clearfix">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="delhicab-admin/img/vehicles/<?php $img=explode(',', $result['vehicle_images']);echo $img[0];?>">
                                    <img class="img-responsive" style="border-right: 1px solid #dedede;width: 375px; height:220px" src="delhicab-admin/img/vehicles/<?php echo $img[0];?>" alt=""/>
                                    
                                </a>
                            </div>
                            <div class="caption">
                               <?php 
							   $drivercharge=$result['driver_charges']*$days;
							   $distancecharge=$finaldistance*$result['price_km'];
							   $total = $distancecharge+$drivercharge;
                               $serviceCharge = floor(($total)*(2/100));
                               $finalTotalAmount = $total+$serviceCharge;
                               //echo $serviceCharge;
							   ?>
                                <h4 class="caption-title"><a href="#"><?php echo $result['vehicle_name'];?></a></h4>
                                <h5 class="caption-title-sub">Rs.<?php echo $result['price_km'];?> / KM for <?php echo $days;?> Days <span style="float:right">Rs. <?php echo number_format($finalTotalAmount);?></span></h5>
                               


							   <div class="caption-text">
							   
							   <div class="col-md-6" style="margin-top:0px;margin-left:-14px"><strong>Billable Total Distance:</strong>
							   <br />
							   <strong>Driver Charges:</strong> <br />
							   <strong>Billable distance Charges:</strong><br />
                               <strong>Service Charge:</strong><br />
							   <strong>Total Charges:</strong>
							   </div>
							   <div class="col-md-6"  style="margin-top:0px;margin-left:-34px;width:60%;margin-bottom:12px">
							   
							    <?php echo $finaldistance." Km ( For ".$triptype." )";?> <br />
								
								 Rs. <?php echo $result['driver_charges']."*".$days."= Rs. ".number_format($drivercharge);?><br />
								 <?php echo $finaldistance;?> * <?php echo $result['price_km'];?> = Rs. <?php echo number_format($distancecharge);?><br />
                                 Rs. <?php echo $serviceCharge;?> <br />
								 Rs.(<?php echo $distancecharge;?> + <?php echo $drivercharge;?> + <?php echo $serviceCharge;?>) = Rs. <?php echo number_format($finalTotalAmount);?>
							   </div>
								
								
								</div>
								
								
                                <table class="table">
                                    <tr>
                                        <td title="Number of Sittings"><i class="fa fa-wheelchair"></i> <?php echo $result['number_sittings'];?></td>
                                        <td title="Number of Baggages"><i class="fa fa-suitcase"></i> <?php echo $result['number_baggages'];?></td>
                                        <td title="AC"><i class="fa fa-cog"></i> <?php echo $result['ac_type'];?></td>
                                        <td class="button">
										<form action="booking.php" method="post">
										<input type="hidden" name="billablekm" value="<?php echo $finaldistance; ?>"/>
										<input type="hidden" name="triptype"  value="<?php echo $triptype; ?>" />
										<input type="hidden" name="drivercharges" value="<?php echo $drivercharge;?>"/>
										<input type="hidden" name="distancecharge" value="<?php echo $distancecharge;?>"/>
										<input type="hidden" name="total" value="<?php echo $total;?>"/>
										<input type="hidden" name="picdate" value="<?php echo $_POST['picdate'];?>"/>
										<input type="hidden" name="dropdate" value="<?php echo $_POST['dropdate'];?>"/>
										<input type="hidden" name="days" value="<?php echo $days;?>"/>
										<input type="hidden" name="from" value="<?php echo $piclocation;?>"/>
										<input type="hidden" name="to" value="<?php echo $droplocation;?>" />
										<input type="hidden" name="vehiclename" value="<?php echo $result['vehicle_name'];?>" />
										<input type="hidden" name="vehicle_id" value="<?php echo $result['vehicle_id'];?>" />
										<input type="hidden" name="vehicle_image" value="<?php echo $img[0];?>" />
										
										<button type="submit" class="btn btn-small btn-theme">Book Now</button>
										</form>
										</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
					
					 <?php }else{ ?>
                        <div class="thumbnail no-border no-padding thumbnail-car-card clearfix">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="delhicab-admin/img/vehicles/<?php $img=explode(',', $result['vehicle_images']);echo $img[0];?>">
                                    <img class="img-responsive" style="border-right: 1px solid #dedede;width: 375px; height:220px" src="delhicab-admin/img/vehicles/<?php echo $img[0];?>" alt=""/>
                                    
                                </a>
                            </div>
                            <div class="caption">
                               <?php 
                               $drivercharge=$result['driver_charges']*$days;
                               $distancecharge=$finaldistance*$result['price_km'];
                               $total = $distancecharge+$drivercharge;
                               //echo $serviceCharge;
                               ?>
                                <h4 class="caption-title"><a href="#"><?php echo $result['vehicle_name'];?></a></h4>
                                <h5 class="caption-title-sub"><span>Rs. <?php echo number_format($total);?> (<?php echo $piclocation;?>-<?php echo $droplocation;?>)</span></h5>
                               


                               <div class="caption-text">
                               
                               <div class="col-md-6" style="margin-top:0px;margin-left:-14px"><strong>Billable Total Distance:</strong>
                               <br />
                               <strong>Driver Charges:</strong> <br />
                               </div>
                               <div class="col-md-6"  style="margin-top:0px;margin-left:-34px;width:60%;margin-bottom:12px">
                               
                                <?php echo $finaldistance." Km ( For ".$triptype." )";?> <br />
                                
                                 Rs. <?php echo $result['driver_charges']."*".$days."= Rs. ".number_format($drivercharge);?><br />
                                 
                                 Rs.(<?php echo $distancecharge;?> + <?php echo $drivercharge;?>) = Rs. <?php echo number_format($total);?>
                               </div>
                                
                                
                                </div>
                                
                                
                                <table class="table">
                                    <tr>
                                        <td title="Number of Sittings"><i class="fa fa-wheelchair"></i> <?php echo $result['number_sittings'];?></td>
                                        <td title="Number of Baggages"><i class="fa fa-suitcase"></i> <?php echo $result['number_baggages'];?></td>
                                        <td title="AC"><i class="fa fa-cog"></i> <?php echo $result['ac_type'];?></td>
                                        <td class="button">
                                        <form action="booking.php" method="post">
                                        <input type="hidden" name="billablekm" value="<?php echo $finaldistance; ?>"/>
                                        <input type="hidden" name="triptype"  value="<?php echo $triptype; ?>" />
                                        <input type="hidden" name="drivercharges" value="<?php echo $drivercharge;?>"/>
                                        <input type="hidden" name="distancecharge" value="<?php echo $distancecharge;?>"/>
                                        <input type="hidden" name="total" value="<?php echo $total;?>"/>
                                        <input type="hidden" name="picdate" value="<?php echo $_POST['picdate'];?>"/>
                                        <input type="hidden" name="dropdate" value="<?php echo $_POST['dropdate'];?>"/>
                                        <input type="hidden" name="days" value="<?php echo $days;?>"/>
                                        <input type="hidden" name="from" value="<?php echo $piclocation;?>"/>
                                        <input type="hidden" name="to" value="<?php echo $droplocation;?>" />
                                        <input type="hidden" name="vehiclename" value="<?php echo $result['vehicle_name'];?>" />
                                        <input type="hidden" name="vehicle_id" value="<?php echo $result['vehicle_id'];?>" />
                                        <input type="hidden" name="vehicle_image" value="<?php echo $img[0];?>" />
                                        
                                        <button type="submit" class="btn btn-small btn-theme">Book Now</button>
                                        </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                     <?php } } ?>

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
                                            <select name="triptype" class="selectpicker input-price" id="tripTypeSelect" data-live-search="true" data-width="100%"
                                                    data-toggle="tooltip" title="Select" required>
                                                <option>Select Category</option>
                                                <?php $all_cats= "SELECT * from triptypes order by triptype_name";
													$run_query=mysqli_query($admin_con, $all_cats);
													while($result=mysqli_fetch_array($run_query)){ ?>
														<option value="<?php echo $result['triptype_name']?>"><?php echo $result['triptype_name']?></option>
											    <?php } ?>
                                            </select>
                                        </div>
										
										<div class="form-group selectpicker-wrapper">
                                            <label>Picking Up Location</label>
                                            <select name="piclocation"  class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                    data-toggle="tooltip" title="Select" required>
                                                <option value="">Select City</option>
																		<?php $all_catss= "SELECT * FROM locations WHERE `city_name` IN ('Delhi','Noida','Ghaziabad','Faridabad','Gurgaon','Haryana')";
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
                                            <input name="picdate" type="text" class="form-control" id="formSearchUpDate3" placeholder="dd/mm/yyyy">
                                            <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                                        </div>

										<div class="form-group has-icon has-label ShowDropLocation">
                                            <label for="formSearchUpDate2">Dropping off Date</label>
                                            <input name="dropdate" type="text" class="form-control" id="formSearchUpDate2" placeholder="dd/mm/yyyy">
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
                            <h4 class="widget-title">Note</h4>
                            <div class="widget-content">
                                <p><strong>1-</strong> Parking Charges at Airports along with toll, Road and other state taxes is not included in total fare.</p>
                                <p><strong>2-</strong> These charges will have to be paid by you directly/reimbursed to the driver if he has paid it on your behalf</p>
                                <p><strong>3-</strong> They will not feature on your invoice.</p>
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
        <?php }else{ ?>
        <section class="page-section color">
            <div class="container">

                <div class="row">

                    <div class="col-md-4">
                        <div class="contact-info">

                            <h2 class="block-title"><span>Contact Us</span></h2>

                            <div class="media-list">
                                <div class="media">
                                    <i class="pull-left fa fa-home"></i>
                                    <div class="media-body">
                                        <strong>Address:</strong><br>
                                        RZ-B-111, Gali Number 9, New Delhi, Delhi 110045
                                    </div>
                                </div>
                                <div class="media">
                                    <i class="pull-left fa fa-phone"></i>
                                    <div class="media-body">
                                        <strong>Telephone:</strong><br>
                                        +91 83685 48255, <br /> +91 75329 81416
                                    </div>
                                </div>
                                <div class="media">
                                    <i class="pull-left fa fa-envelope-o"></i>
                                    <div class="media-body">
                                        <strong>Email:</strong><br>
                                        info@dehlicarbooking.in, <br />
                                        support@dehlicarbooking.in, <br />
                                        inquiry@dehlicarbooking.in
                                    </div>
                                </div>
                                 <div class="media" style="background-color:#085078">
                                    <img style="width:100%" class="img-responsive" src="assets/img/preview/cars/Delhi-Car-Booking-Services.png" alt="" />
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-md-offset-1 text-left">
                        <?php if(isset($_GET['msg'])){?>
                        <p style="color:green; font-weight:600"><i class="fa fa-thumbs-up" ></i> Your Message has been successfully received. We will contact you soon. </p>
                        <?php }?>
                        <h2 class="block-title"><span>Contact Form</span></h2>

                        <!-- Contact form -->
                        <form  method="post" action="inquiry.php" class="contact-form">

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="name">Name*</label>
                                    <input type="text" name="name" id="name" placeholder="Name" value="" size="30"
                                            data-toggle="tooltip" title="Name is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>
                            
                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="name">Email*</label>
                                    <input type="text" name="email" id="name" placeholder="Email" value="" size="30"
                                            data-toggle="tooltip" title="Email is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>
                            
                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="name">Mobile*</label>
                                    <input type="text" name="mobile" id="name" placeholder="Mobile" value="" size="30"
                                            data-toggle="tooltip" title="Mobile Number is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>
                            
                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="name">Address*</label>
                                    <input type="text" name="address" id="name" placeholder="Address" value="" size="30"
                                            data-toggle="tooltip" title="Address is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>
                            
                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="name">City*</label>
                                    <input type="text" name="city" id="name" placeholder="City" value="" size="30"
                                            data-toggle="tooltip" title="City is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="email">Country*</label>
                                    <input type="text" name="country" id="email" placeholder="Country" value="" size="30"
                                            data-toggle="tooltip" title="Country is required"
                                            class="form-control placeholder" required/>
                                </div>
                            </div>

                            <div class="form-group af-inner">
                                <label class="sr-only" for="input-message">Message</label>
                                <textarea name="message" id="input-message" placeholder="Message" rows="4" cols="50"
                                        data-toggle="tooltip" title="Message is required"
                                        class="form-control placeholder" required></textarea>
                            </div>

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <button type="submit" name="submit" class="form-button form-button-submit btn btn-theme btn-theme-dark" id="submit_btn">Send message</button>
                                </div>
                            </div>

                        </form>
                        <!-- /Contact form -->
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        <!-- /PAGE WITH SIDEBAR -->

        <?php include('footer.php');?>
        <!-- /PAGE -->

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
<!--<![endif]-->
<script>
    $(document).ready(function(){
        $("#tripTypeSelect").change(function(){
            var trip_name = $(this).val();
            //alert(trip_name);
            if(trip_name=="One Way"){
                $(".ShowDropLocation").hide();
            }
            if(trip_name=="Round"){
                $(".ShowDropLocation").show();
            }
        });
    });
</script>

</body>
</html>