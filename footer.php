
		
		<footer class="footer" style="padding-top:30px">
        <div class="footer-widgets">
            <div class="container">
			<h2 class="section-title">
                    <small>We have full cab booking services on most popular tourist place</small>
                    <span>POPULAR TOURIST PLACES IN INDIA</span>
                </h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="widget widget-categories">
                            <h4 class="widget-title">Texi Services from Dehli</h4>
                            <ul>
                                <?php $all_catssss= "SELECT * from trips where trip_from='Delhi' order by trip_name";
											$run_querys=mysqli_query($admin_con, $all_catssss);
											 while($results=mysqli_fetch_array($run_querys)){
											?>
                                            <li><a href="cars_list.php?tripid=<?php echo $results['trip_id'];?>&tripup=<?php echo $results['trip_from'];?>&tridrop=<?php echo $results['trip_end']; ?>"><?php echo $results['trip_name']?></a></li>
								 <?php } ?>
                            </ul>
                        </div>
                    </div>
                   
					  <div class="col-md-4">
                        <div class="widget widget-categories">
                            <h4 class="widget-title">Texi Services From Noida</h4>
                            <ul>
                                <?php $all_catssss= "SELECT * from trips where trip_from='Noida' order by trip_name";
											$run_querys=mysqli_query($admin_con, $all_catssss);
											 while($results=mysqli_fetch_array($run_querys)){
											?>
                                <li><a href="cars_list.php?tripid=<?php echo $results['trip_id'];?>&tripup=<?php echo $results['trip_from'];?>&tridrop=<?php echo $results['trip_end']; ?>"><?php echo $results['trip_name']?></a></li>
								
								 <?php } ?>
                            </ul>
                        </div>
                    </div>
					 <div class="col-md-4">
                        <div class="widget widget-categories">
                            <h4 class="widget-title">Texi Services from Gurgaon</h4>
                            <ul>
                                <?php $all_catssss= "SELECT * from trips where trip_from='Gurgaon' order by trip_name";
											$run_querys=mysqli_query($admin_con, $all_catssss);
											 while($results=mysqli_fetch_array($run_querys)){
											?>
                                <li><a href="cars_list.php?tripid=<?php echo $results['trip_id'];?>&tripup=<?php echo $results['trip_from'];?>&tridrop=<?php echo $results['trip_end']; ?>"><?php echo $results['trip_name']?></a></li>
								
								 <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </footer>

        <!-- PAGE -->
        <section class="page-section"  style="background-color: #085078; color:#ececec">
            <div class="container">

                <!-- Get in touch -->

                <h2 class="section-title">
                    <small style="color:#ececec">Feel Free to Say Hello!</small>
                    <span style="color:#fff">Get in Touch With Us</span>
                </h2>

                <div class="row">
                    <div class="col-md-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.7547494878772!2d77.08773681450977!3d28.607133382427822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1be728fa3fb1%3A0xbf65b672248ee638!2sDelhi+Car+Booking!5e0!3m2!1sen!2sin!4v1539552754534" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-5">

                        <p>We are one of largest Car Rental Company – #Delhicarbooking, having well maintained vehicles and experienced car-driver. With Delhicarbooking, we endeavor to provide users the Best in Car rental Services and Technology at lowest prices.</p>

                        <ul class="media-list contact-list">
                            <li class="media">
                                <div class="media-left"><i class="fa fa-home"></i></div>
                                <div class="media-body">Adress: RZ-B-111, Gali Number 9, New Delhi - 110045</div>
                            </li>
                           
                            <li class="media">
                                <div class="media-left"><i class="fa fa-phone"></i></div>
                                <div class="media-body">Support Phone:  +91 8368548255, +91 7532981416</div>
                            </li>
                            <li class="media">
                                <div class="media-left"><i class="fa fa-envelope"></i></div>
                                <div class="media-body">E mails: info@dehlicarbooking.in</div>
                            </li>
                            <li class="media">
                                <div class="media-left"><i class="fa fa-clock-o"></i></div>
                                <div class="media-body">Working Hours: 24 * 7 Hrs</div>
                            </li>
                            
                        </ul>

                    </div>
					<div class="col-md-2">
					<div class="widget widget-categories">
                            <h4 class="widget-title" style="color:white">Information</h4>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="cab-booking-from-delhi-rates.php">Rate List</a></li>
                                <li><a href="contact-us.php">Contact Us</a></li>
                                <li><a href="terms.php">Terms & Conditions</a></li>
                                <li><a href="privacy.php">Private Policy</a></li>
                            </ul>
                        </div>
					
					</div>
                </div>

                <!-- /Get in touch -->

            </div>
        </section>