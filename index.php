<?php 
 include('delhicab-admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Best Cab Booking Services In Delhi NCR | Home</title>

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

        <!-- PAGE -->
        <section class="page-section no-padding slider">
            <div class="container full-width">

                 <div class="main-slider">
                    <div class="owl-carousel" id="main-slider">

                        <!-- Slide 3 -->
                        <div class="item slide3 ver3">
                            <div class="caption">
                                <div class="container">
                                    <div class="div-table">
                                        <div class="div-cell">
                                            <div class="caption-content">
                                                <!-- Search form -->
                                                <div class="form-search light">
                                                    <form action="delhi-cab-booking.php" method="post">
                                                        <div class="form-title">
                                                            <i class="fa fa-globe"></i>
                                                            <h2>Search for Cheap Rental Cars Wherever Your Are</h2>
                                                        </div>

                                                        <div class="row row-inputs">
                                                            <div class="container-fluid">
															<div class="col-sm-12">
                                                                <div class="form-group has-icon has-label">
                                                                        <label for="formSearchUpLocation3">Trip Type</label><br />
                                                                        <?php $all_cats= "SELECT * from triptypes order by triptype_name";
                                                                            $run_query=mysqli_query($admin_con, $all_cats);
                                                                            while($result=mysqli_fetch_array($run_query)){ 
                                                                                    ?>
                                                                            <div class="radio radio-inline">
                                                                                <input type="radio" id="inlineRadio1" value="<?php echo $result['triptype_name']?>" name="triptype" checked="">
                                                                                <label for="inlineRadio1"><?php echo $result['triptype_name']?></label>
                                                                            </div>
                                                                        <?php }?>
                                                                        </div>
																</div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group has-icon has-label">
                                                                        <label for="toSearchUpLocation3">Picking Up Location</label>
                                                                        <select name="piclocation"  class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                    data-toggle="tooltip" title="Select" required>
																		<option value="">Select City</option>
																		<?php $all_cats= "SELECT * FROM locations WHERE `city_name` IN ('Delhi','Noida','Ghaziabad','Faridabad','Gurgaon','Haryana')";
											                 $run_query=mysqli_query($admin_con, $all_cats);
											$i=1;
											 while($result=mysqli_fetch_array($run_query)){
											?>
																		<option value="<?php echo $result['city_name']?>"><?php echo $result['city_name']?></option>
											 <?php } ?>
																		</select>
                                                                        <span class="form-control-icon"><i class="fa fa-location-arrow"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                     <div class="form-group has-icon has-label">
                                                                        <label for="dropSearchUpLocation3">Drop Location</label>
                                                                        <select name="droplocation"  class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                    data-toggle="tooltip" title="Select" required>
																		<option value="">Select City</option>
																		<?php $all_cats= "SELECT * from locations order by city_name";
											$run_query=mysqli_query($admin_con, $all_cats);
											
											 while($result=mysqli_fetch_array($run_query)){
											?>
																		<option value="<?php echo $result['city_name']?>"><?php echo $result['city_name']?></option>
											 <?php } ?>
																		</select>
                                                                        <span class="form-control-icon"><i class="fa fa-location-arrow"></i></span>
                                                                    </div>
                                                                </div>
																<div class="col-sm-6">
                                                                    <div class="form-group has-icon has-label">
                                                                        <label for="formSearchUpDate3">Picking Up Date</label>
                                                                        <input name="picdate" type="date" class="form-control" id="formSearchUpDate3" placeholder="dd/mm/yyyy">
                                                                        <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group has-icon has-label dropLocationid">
                                                                        <label for="formSearchUpDate2">Dropping off Date</label>
                                                                        <input name="dropdate" type="date" class="form-control" id="formSearchUpDate2" placeholder="dd/mm/yyyy">
                                                                        <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
																
                                                            </div>
                                                        </div>

                                                       

                                                      
                                                        <div class="row row-submit">
                                                            <div class="container-fluid">
                                                                <div class="inner">
                                                                    <i class="fa fa-plus-circle"></i> <a>Search Your Car</a>
                                                                    <button type="submit" id="formSearchSubmit3" class="btn btn-submit btn-theme pull-right">Find Car</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /Search form -->

                                                <h2 class="caption-title">For rental Cars</h2>
                                                <h3 class="caption-subtitle">Best Deals</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Slide 3 -->

                       

                        <!-- Slide 4 -->
                        <div class="item slide4 ver4">
                            <div class="caption">
                                <div class="container">
                                    <div class="div-table">
                                        <div class="div-cell">
                                            <div class="caption-content">
                                                <h2 class="caption-title">For rental Cars</h2>
                                                <h3 class="caption-subtitle"><span>Best Deals</span></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Slide 4 -->

                    </div>
                </div>

            </div>
        </section>
        <!-- /PAGE -->

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">

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
        <!-- /PAGE -->

        <!-- PAGE -->
        <section class="page-section dark" style="background-color: #085078;">
            <div class="container">

                <div class="row">
                    <div class="col-md-7" style="text-align:justify">
                        <h2 class="section-title text-left">
                            <small>Great car rental services from Delhi</small>
                            <span> What Do You Know About Us</span>
                        </h2>
                        <p style="color:#ececec">We are one of largest Car Rental Company – Delhicarbooking, having well maintained vehicles and experienced car-driver. With Delhicarbooking, we endeavor to provide users the Best in Car rental Services and Technology at lowest prices. We are Delhi’s fastest growing Car Booking brand with a wide range of cars for you to choose from. Delhicarbooking is currently present in 3 Indian cities including Delhi, Noida, Gurgaon and Faridabad. </p>
						
						<p  style="color:#ececec">Be it business travel, leisure travel, intercity getaways or just city visit – take a ride with our exhaustive range of well-maintained Hatchbacks, Sedans, MUVs, SUVs, Hybrids and Luxury Cars. We offer over 20 vehicle makes to choose from across various cities, ensuring you get the best rental cars at lowest prices throughout India.</p>
						
						<p  style="color:#ececec">Our cars come with unlimited kilometres so you can concentrate on counting memories, not kilometers. You can either pick up the car from one of our predefined locations near you or have the car of your choize hand delivered to your doorstep, office or your arrival airport. So what are you waiting for? Time to book and ride with Lowest Prices Guaranteed!</p>
                       
                        <p class="btn-row">
                            <a href="car-booking-from-delhi-rates.php" class="btn btn-theme btn-theme-md">See All Rates</a>
                            <a href="contact-us.php" class="btn btn-theme btn-theme-md btn-theme-transparent">Reservation Now</a>
                        </p>
                    </div>
					<div class="col-md-5">
					<img style="width:100%" class="img-responsive" src="assets/img/preview/cars/Delhi-Car-Booking-Services.png" alt="" />
					</div>
                    
                </div>

            </div>
        </section>
        <!-- /PAGE -->

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">

                <h2 class="section-title">
                    <small>We have wide range of well maintained vehicles with experienced drivers.</small>
                    <span>COMPLETE RANGE FOR OUTSTATION TAXI FROM DELHI</span>
                </h2>

                <div class="tabs">
                    
                </div>

                <div class="tab-content">

                  
                    <!-- tab 2 -->
                    <div class="tab-pane fade active in" id="tab-2">

                        <div class="swiper swiper--offers-popular">
                            <div class="swiper-container">

                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                   
								<?php $all_cats= "SELECT * from vehicles order by vehicle_name";
											$run_query=mysqli_query($admin_con, $all_cats);
											 while($result=mysqli_fetch_array($run_query)){
											?>
								   <div class="swiper-slide">
                                        <div class="thumbnail no-border no-padding thumbnail-car-card">
                                            <div class="media">
                                               
                                                    <img src="delhicab-admin/img/vehicles/<?php $img=explode(',', $result['vehicle_images']);echo $img[0];?>" alt=""/>
													
                                            </div>
                                            <div class="caption text-center">
                                                <h4 class="caption-title"><a href="#"><?php echo $result['vehicle_name'];?></a></h4>
                                                <div class="caption-text"><?php echo "Rs. ".$result['price_km']."/km";?> & 250 km/day</div>
                                                <div class="buttons">
                                                    <a class="btn btn-theme" href="contact-us.php">Book Now</a>
                                                </div>
                                                <table class="table">
                                                    <tr>
                                                        <td><i class="fa fa-wheelchair"></i> <?php echo $result['number_sittings']; ?></td>
                                                        <td><i class="fa fa-suitcase"></i> <?php echo $result['number_baggages']; ?></td>
                                                        <td><i class="fa fa-cog"></i> <?php echo $result['ac_type']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
											 <?php } ?>
                                    
                                   
                                   
                                </div>

                            </div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                            <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>

                        </div>

                    </div>

                    
                </div>

            </div>
        </section>
        <!-- /PAGE -->
<section class="page-section image subscribe">
            <div class="container">

                <h2 class="section-title">
                    <span>Cheap car rental services for your desired destination</span>
                </h2>

                <div class="row">
                    <div class="col-md-12">

                        <p class="text-center">We offer customized tour services to our customer as per their exact needs. We have a variety of options that can enhance customer’s experience, always according to their necessities, and help them to get the best out of your holidays or your business trip. Our constant market research ensures the finest final prices for car rental for desired destination. Since option prices and fees are included, with Delhicarbooking there are never surprises at the desk! Rental Cars in your desired destination</p>

                       

                    </div>
                </div>

            </div>
        </section>
        
        
      

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">

                <h2 class="section-title">
                    <small>We have full cab booking services on most popular tourist place</small>
                    <span>POPULAR TOURIST PLACES IN INDIA</span>
                </h2>

                <div class="row">
                   
			<?php $all_catssss= "SELECT * from tour_locations order by title";
											$run_querys=mysqli_query($admin_con, $all_catssss);
											 while($results=mysqli_fetch_array($run_querys)){
											?>
				   <div class="col-md-4">
                        <div class="recent-post alt">
                            <div class="media">
                                <a class="media-link" href="cab-booking-from-delhi-rates.php">
                                    <div class="badge type"><?php echo $results['title']?></div>
                                    <img class="media-object" src="delhicab-admin/img/locations/<?php echo $results['image']?>" alt="<?php echo $results['image']?>" title="<?php echo $results['image']?>">
                                </a>
                               
                                <div class="media-body">
                                    
                                    <div class="media-excerpt"><?php echo $results['about']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
											 <?php } ?>
					
					
                    
                </div>

               
            </div>
        </section>
        <!-- /PAGE -->

       <?php include('footer.php');?>
        <!-- /PAGE -->

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
    <!-- /FOOTER -->

    <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

</div>
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

<script type="text/javascript">
$(document).ready(function(){
    $('#triptype').on('change',function(){
        var triptype = $(this).val();
        if(triptype=='Delhi'){
            $("#piclocation").css({"display": "none"});
        }
    });
    // SHOW AND HIDE ONE WAY AND ROUND TRIP //
    $("input[name$='triptype']").click(function(){
        var type_name = $(this).val();
        if(type_name=="One way"){
            $(".dropLocationid").hide();
        }
        if(type_name=="Round"){
            $(".dropLocationid").show()
        }
    });

    // SELECT TRIP TYPE //
    // $("input[name$='triptype']").click(function(){
    //     var trip_id = $(this).val();
    //     $.ajax({
    //         method:"post",
    //         url:"check_list.php",
    //         data:{trip_id:trip_id},
    //         dataType:"json",
    //         success:function(data){
    //             console.log(data);

    //             var i=0;
    //             var prHtm='';
    //             for(var key in data.locInfo){
    //                 prHtm +='<option value='+data.locInfo[i].rate_id+'>'+data.locInfo[i].size_related_price+'</option>';
    //                 i++;
    //             }
    //             $("#priceData").html(prHtm);
    //         }
    //     });
    // });
});
</script>
</body>
</html>