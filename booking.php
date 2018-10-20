<?php 

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

include('delhicab-admin/connection.php');

$billablekm=$_POST['billablekm'];
$triptype=$_POST['triptype'];
$drivercharges=$_POST['drivercharges'];
$distancecharge=$_POST['distancecharge'];
$total=$_POST['total'];
$serviceCharge = floor(($total)*(2/100));
$finalTotalAmount = $total+$serviceCharge;
$picdate=$_POST['picdate'];
$dropdate=$_POST['dropdate'];
$days=$_POST['days'];
$from=$_POST['from'];
$to=$_POST['to'];
$vehiclename=$_POST['vehiclename'];
$vehicle_id=$_POST['vehicle_id'];
$vehicle_image=$_POST['vehicle_image'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dehli Cab booking </title>

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
                    <h1>Car Booking</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Booking & Payment</li>
                </ul>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE WITH SIDEBAR -->
        <section class="page-section with-sidebar sub-page" >
            <div class="container">
                <div class="row">
                    <!-- CONTENT -->
                    <div class="col-md-9 content" id="content">

                        <h3 class="block-title alt"><i class="fa fa-angle-down"></i>Taxi Information</h3>
                        <div class="car-big-card alt">
                            <div class="row">
                                <div class="col-md-6">
                                    <img style="width:100%" class="img-responsive" src="delhicab-admin/img/vehicles/<?php echo $vehicle_image;?>" alt="" />
                                </div>
                                <div class="col-md-6">
                                    <div class="car-details">
                                        <div class="list">
                                            <ul>
                                                <li class="title">
                                                    <h2><?php echo $vehiclename;?></h2>
													<i class="fa fa-paper-plane" ></i> From <?php echo $from;?> to <?php echo $to;?> (<?php echo $triptype;?>)
                                                </li>
                                                <li>Picking Up date - <?php echo date('jS M Y',strtotime($picdate));?></li>
                                                <li>Dropping Off date - <?php echo date('jS M Y',strtotime($dropdate));?></li>
                                                <li>Driver Charges - Rs.<?php echo $drivercharges;?></li>
                                                <li>Travelling Charges - Rs.<?php echo number_format($distancecharge);?></li>
                                                <li>Service Charges - Rs.<?php echo $serviceCharge;?></li>
                                                <li>Total Charges - Rs.<?php echo number_format($total);?></li>
                                            </ul>
                                        </div>
                                        <div class="price">
                                            <strong>Rs.<?php echo number_format($finalTotalAmount);?></strong> <span>/for <?php echo $days;?> day(s)</span> <i class="fa fa-info-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="page-divider half transparent"/>

                       
                        <h3 class="block-title alt"><i class="fa fa-angle-down"></i>Customer Information</h3>
                        <form action="pgRedirect.php" method="post" class="form-delivery">
                            <div class="row">
                                <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "DCBO" . rand(10000,99999999)?>">
								<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo  "CUST" . rand(10000,99999999)?>">
                                <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                                <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">

                                <input type="hidden" name="booking_from"  value="<?php echo $from; ?>" />
								<input type="hidden" name="booking_to" value="<?php echo $to;?>"/>
								<input type="hidden" name="drop_date" value="<?php echo $dropdate;?>"/>
								<input type="hidden" name="trip_type" value="<?php echo $triptype;?>"/>
								<input type="hidden" name="vehicle_name" value="<?php echo $vehiclename;?>"/>
								<input type="hidden" name="total_charges" value="<?php echo $finalTotalAmount;?>"/>
							
                                <div class="col-md-12">
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio1" value="Mr" name="Customer_type" checked="">
                                        <label for="inlineRadio1">Mr</label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="Ms" name="Customer_type">
                                        <label for="inlineRadio2">Ms</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-icon has-label"><label for="formSearchUpLocation3">Full Name</label>
                                        <input name="customer_name" type="text" class="form-control" id="formSearchUpLocation3" placeholder="Full Name" required>
                                        <span class="form-control-icon"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                     <div class="form-group has-icon has-label"><label for="formSearchUpLocation4">Email Id</label>
                                        <input name="customer_email" type="text" class="form-control" id="formSearchUpLocation4" placeholder="Email Id" required>
                                        <span class="form-control-icon"><i class="fa fa-envelope"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-icon has-label"><label for="formSearchUpLocation5">Phone Number</label>
                                        <input name="customer_phone" type="text" class="form-control" id="formSearchUpLocation5" placeholder="Phone Number" required>
                                        <span class="form-control-icon"><i class="fa fa-phone"></i></span>
                                    </div>
                                </div>
								<div class="col-md-6">
                                     <div class="form-group has-icon has-label"><label for="formSearchUpDate3">Picking Up Date and Time</label>
                                        <input name="pick_date" type="text" class="form-control" id="formSearchUpDate3" placeholder="dd/mm/yyyy" required>
                                        <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-icon has-label"><label for="formSearchUpLocation6">Your Full Address</label>
                                        <textarea rows="3" name="customer_address" type="text" class="form-control" id="formSearchUpLocation6" placeholder="Your Complete Address" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <br /><br />
                            <h3 class="block-title alt"><i class="fa fa-angle-down"></i>Additional Information</h3>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="additional" id="fad-message" title="Addition information is required" data-toggle="tooltip"
                                                class="form-control alt" placeholder="Additional Information" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="overflowed reservation-now">
                                <!-- <div class="checkbox pull-left">
                                    <input id="accept" type="checkbox" name="fd-name" title="Please accept" data-toggle="tooltip" required>
                                    <label for="accept">I accept all information and Payments etc</label>
                                </div> -->
                                <a href="index.php" style="color: #fff" class="btn btn-info pull-right btn-cancel"> << REPLAN</a>
                                <button type="submit" class="btn btn-primary pull-right"> 100% Pay Now</button>
                                <button type="submit" class="btn btn-success pull-right">20% Pay Now</button>
                            </div>
						 </form>
                    </div>
                    <!-- /CONTENT -->

                    <!-- SIDEBAR -->
                    <aside class="col-md-3 sidebar" id="sidebar">
                        <!-- widget detail reservation -->
                        <div class="widget shadow widget-details-reservation">
                            <h4 class="widget-title">Detail Reservation</h4>
                            <div class="widget-content">
                                <h5 class="widget-title-sub">Picking Up Location</h5>
                                <div class="media">
                                    <span class="media-object pull-left"><i class="fa fa-calendar"></i></span>
                                    <div class="media-body"><p><?php echo date('jS M Y',strtotime($picdate));?></p></div>
                                </div>
                                <div class="media">
                                    <span class="media-object pull-left"><i class="fa fa-location-arrow"></i></span>
                                    <div class="media-body"><p>From <?php echo $from;?></p></div>
                                </div>
                                <h5 class="widget-title-sub">Droping Off Location</h5>
                                <div class="media">
                                    <span class="media-object pull-left"><i class="fa fa-calendar"></i></span>
                                    <div class="media-body"><p><?php echo date('jS M Y',strtotime($dropdate));?></p></div>
                                </div>
                                <div class="media">
                                    <span class="media-object pull-left"><i class="fa fa-location-arrow"></i></span>
                                    <div class="media-body"><p>From <?php echo $from;?></p></div>
                                </div>
                                <div class="button">
                                    <a href="index.php" class="btn btn-block btn-theme btn-theme-dark">Update Reservation</a>
                                </div>
                            </div>
                        </div>
                      
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
                    </aside>
                    <!-- /SIDEBAR -->

                </div>
            </div>
        </section>
       <?php include('footer.php');?>

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
<script src="assets/js/theme.js">
    // $(document).ready(function(){
    //     $("#formSearchUpDate3").datetimepicker({
    //         minDate:0
    //     });
    // });
</script>


</body>
</html>