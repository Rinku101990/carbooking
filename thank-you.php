<?php 

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
include('delhicab-admin/connection.php');

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rent It</title>

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
        <section class="page-section breadcrumbs text-center" style="background-image: url(assets/img/Background.png);">
            <div class="container">
                <div class="page-header">
                    <h1>Thank You</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Booking</a></li>
                    <li class="active">Booking Status</li>
                </ul>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE -->
         <section class="page-section with-sidebar sub-page" >
            <div class="container">
                <div class="row">
                    <!-- CONTENT -->
                    <div class="col-md-12 content" id="content">
                        <div class="car-big-card alt">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="car-details">
                                    <?php
                                        if($isValidChecksum == "TRUE") {
                                            echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
                                            if ($_POST["STATUS"] == "TXN_SUCCESS") {
                                                echo "<b>Transaction status is success</b>" . "<br/>";
                                                //Process your transaction here as success transaction.
                                                //Verify amount & order id received from Payment gateway with your application's order id and amount.
                                            }
                                            else {
                                                echo "<b>Transaction status is failure</b>" . "<br/>";
                                            }

                                            if (isset($_POST) && count($_POST)>0 ){ 

                                                $ordid  = $_POST['ORDERID'];
                                                $txnid  = $_POST['TXNID'];
                                                $status = $_POST['STATUS'];
                                                // SAVE TRANSECTION ID FOR RELATED ORDER ID //
                                                $save_txn_id = "UPDATE booking_details SET booking_transection_id='".$txnid."',booking_payment_status='".$status."' WHERE booking_number='".$ordid."'";
                                                $txnResult = mysqli_query($admin_con, $save_txn_id);
                                            ?>
                                            <?php if($_POST['RESPCODE']=="01"){ ?>
                                                
                                                <p class="text-center lead" style="color:green; font-weight:600;padding:4%"><strong>Thank You</strong> Your Booking has been successfully completed.<br> Your Booking ID is<b style=" color:red"> <?php echo $_POST['ORDERID'];?></b>. For any query you can contact us on +91 7532981416</p>
                                            
                                            <?php }else if($_POST['RESPCODE']=="227"){ ?>
                                                
                                                <p class="text-center lead" style="color:green; font-weight:600;padding:4%">Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same.<br> Your Booking ID is<b style=" color:red"> <?php echo $_POST['ORDERID'];?></b>. For any query you can contact us on +91 7532981416</p>
                                            
                                            <?php }else if($_POST['RESPCODE']=="334"){ ?>
                                                
                                                <p class="text-center lead" style="color:green; font-weight:600;padding:4%">Invalid Order ID<b style=" color:red"> Try Again</b>. For any query you can contact us on +91 7532981416</p>
                                            
                                            <?php }else if($_POST['RESPCODE']=="400"){ ?>
                                                
                                                <p class="text-center lead" style="color:green; font-weight:600;padding:4%">Transaction status not confirmed yet<br> Your Booking ID is<b style=" color:red"> <?php echo $_POST['ORDERID'];?></b>. For any query you can contact us on +91 7532981416</p>
                                            
                                            <?php }else if($_POST['RESPCODE']=="401"){ ?>
                                                
                                                <p class="text-center lead" style="color:green; font-weight:600;padding:4%">Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same. For any query you can contact us on +91 7532981416</p>
                                            
                                            <?php }else if($_POST['RESPCODE']=="402"){ ?>
                                                
                                                <p class="text-center lead" style="color:green; font-weight:600;padding:4%">    Looks like the payment is not complete. Please wait while we confirm the status with your bank. For any query you can contact us on +91 7532981416</p>
                                            
                                            <?php }else if($_POST['RESPCODE']=="810"){ ?>
                                                
                                                <p class="text-center lead" style="color:green; font-weight:600;padding:4%">Transection has been failed.<br> Your Booking ID is<b style=" color:red"> <?php echo $_POST['ORDERID'];?></b>. For any query you can contact us on +91 7532981416</p>
                                            
                                            <?php }else{ ?>
                                            <?php } ?>
                                            

                                        <?php   } } else {
                                            echo "<b>Checksum mismatched.</b>";
                                        }
                                    ?>                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /CONTENT -->
                </div>
            </div>
        </section>
        <!-- /PAGE -->
		
        <!-- PAGE -->
        <section class="page-section" style="padding-top: 32px; padding-bottom: 10px;">
            <div class="container">
                <h2 class="section-title">
                    <span>WHY PEOPLE CHOOSE DELHI CAB</span>
                </h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="thumbnail thumbnail-featured no-border no-padding">
                            <div class="media">
                                <a class="media-link" href="#">
                                    <div class="caption">
                                        <div class="caption-wrapper div-table">
                                            <div class="caption-inner div-cell">
                                                <div class="caption-icon"><i class="fa fa-car"></i></div>
                                                <h4 class="caption-title">Well maintained & clean cars</h4>
                                                <div class="caption-text">Wide range of well maintained & clean cars for Outstation Tours.</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumbnail thumbnail-featured no-border no-padding">
                            <div class="media">
                                <a class="media-link" href="#">
                                    <div class="caption">
                                        <div class="caption-wrapper div-table">
                                            <div class="caption-inner div-cell">
                                                <div class="caption-icon"><i class="fa fa-user"></i></div>
                                                <h4 class="caption-title">Highly Trained Drivers</h4>
                                                <div class="caption-text">Drivers are verified & well Trained for Driver on Highway & Hills.</div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumbnail thumbnail-featured no-border no-padding">
                            <div class="media">
                                <a class="media-link" href="#">
                                    <div class="caption">
                                        <div class="caption-wrapper div-table">
                                            <div class="caption-inner div-cell">
                                                <div class="caption-icon"><i class="fa fa-users"></i></div>
                                                <h4 class="caption-title">Client’s Satisfaction</h4>
                                                <div class="caption-text">Provide best routes, price and services for 100% client’s satisfaction.</div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
					<div class="col-md-3">
                        <div class="thumbnail thumbnail-featured no-border no-padding">
                            <div class="media">
                                <a class="media-link" href="#">
                                    <div class="caption">
                                        <div class="caption-wrapper div-table">
                                            <div class="caption-inner div-cell">
                                                <div class="caption-icon"><i class="fa fa-lock"></i></div>
                                                <h4 class="caption-title">Privacy & Freedom</h4>
                                                <div class="caption-text">Make every moment count with the privacy and freedom of having your own car.</div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
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
<script src="assets/js/theme.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

</body>
</html>