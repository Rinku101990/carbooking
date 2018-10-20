<?php 
 include('delhicab-admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Delhi Cab Booking Services | Contact Us</title>

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

    <!-- HEADER -->
   <?php include('header.php');?>
    <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs text-center"  style="background-image: url(assets/img/Background.png);">
            <div class="container">
                <div class="page-header">
                    <h1>Contact Us</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Contact Us</li>
                </ul>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE -->
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
						<p style="color:green; font-weight:600"><i class="fa fa-thumbs-up" ></i> Your Message has been successfully received. We will contact you soon.	</p>
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
        <!-- /PAGE -->

      <?php include('footer.php');?>

    </div>
    <!-- /CONTENT AREA -->

    <!-- FOOTER -->
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
<script src="assets/plugins/swiper/js/swiper.jquery.min.js"></script>
<script src="assets/plugins/datetimepicker/js/moment-with-locales.min.js"></script>
<script src="assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- JS Page Level -->
<script src="assets/js/theme-ajax-mail.js"></script>
<script src="assets/js/theme.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<!--<![endif]-->

</body>
</html>