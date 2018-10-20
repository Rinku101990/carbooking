<?php 
 include('av-admin/connection.php');  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>AV Fashion Group</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="images/icons.png" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ALL CSS FILES -->
    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="css/style-mob.css" rel="stylesheet" />
   
</head>

<body>

    <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
               <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="http://avfashiongroup.in"><img src="images/fashion-logo.png" alt="" />
						</a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            
                            <ul>
                                <li><a href="http://avfashiongroup.in/">Home</a>
                                <li><a href="enroll.php">Register </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                               <li><a href="#"><i class="fa fa-map-marker"></i> c/110 street no .6 shastri park delhi-110053</a>
                                </li>
                                <li><a href="#"><i class="fa fa-phone"></i> +91 8130065376, +91 9910824460, +91 9560718379</a>
                                </li>
                                <li><a href="#"><i class="fa fa-envelope"></i>  avfashiongroup@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                       
                        <div class="ed-com-t1-social">
                           <ul>
                               <li><a href="https://facebook.com/Avfashiongroup1/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="https://instagram.com/av_fashiongroup?utm_source=ig_profile_share&igshid=pbgib6ihzrb1"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="http://avfashiongroup.in/"><img src="images/fashion-logo.png" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li><a href="http://avfashiongroup.in/">Home</a>
                                <li><a href="enroll.php">Register </a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="all-drop-down-menu">

                    </div>

                </div>
            </div>
        </div>
       
    </section>
    <!--END HEADER SECTION-->

    <!--SECTION START-->
    <section class="c-all h-quote">
        <div class="container">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="all-title quote-title qu-new">
                    <h2>Enroll Now with us</h2>
                    <center>
				<img class="img-responsive" style="; height:150px;" src="images/logo.jpeg" alt="" /></center>
                    <p class="help-line">Help Line <span>+91 81300 65376</span> </p> <span class="help-arrow pulse"><i class="fa fa-angle-right" aria-hidden="true"></i></span> </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="n-form-com admiss-form">
				<?php if(isset($_GET['status'])){ ?>
				<p style="color:green;font-weight:bold">*Your registrations has been sucssessfully Done!</p><br /><br /><?php }?>
				<?php if(isset($_GET['mobile'])){ ?>
				<p style="color:red;font-weight:bold">*Mobile number already registered!</p><br /><br /><?php }?>
                    <div class="col s12">
                        <form class="form-horizontal" method="post" action="register.php">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Full Name:</label>
                                <div class="col-sm-9">
                                    <input name="av_name" type="text" class="form-control" placeholder="Enter your name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Phone:</label>
                                <div class="col-sm-9">
                                    <input name="av_phone" type="tel" pattern="^\d{10}$" class="form-control" placeholder="Enter your phone number" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Email Id (Optional)</label>
                                <div class="col-sm-9">
                                    <input name="av_email" type="email" class="form-control" placeholder="Enter email" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Age</label>
                                <div class="col-sm-9">
                                    <input name="av_age" type="text" class="form-control" placeholder="Enter your Age" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Applying For</label>
                                <div class="col-sm-9">
                                <select name="av_catid" class="initialized">
								
								<option>-- Select Category --</option>
								<?php $all_cats1= "SELECT * from categories";
								$run_query1=mysqli_query($admin_con, $all_cats1);
								 while($result1=mysqli_fetch_array($run_query1)){
								     
								?>
								<option value="<?php echo $result1['av_catid']?>"><?php echo $result1['av_cat']?></option>
								 <?php }?>
							  </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">City</label>
                                <div class="col-sm-9">
                                    <input name="av_city" type="text" class="form-control" placeholder="Enter your City" required>
                                </div>
                            </div>
                            <div class="form-group mar-bot-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <i class="waves-effect waves-light light-btn waves-input-wrapper" style=""><input type="submit" value="APPLY NOW" class="waves-button-input"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!--HEADER SECTION-->
    <section class="wed-rights">
        <div class="container">
            <div class="row">
                <div class="copy-right">
                    <p>Copyrights © 2018 AV Fashion Group. All rights reserved. Design by <a href="https://www.ordiusits.com" target="_blank" > Ordius IT Solutions Pvt Ltd</a></p>
                </div>
            </div>
        </div>
    </section>
    

    <section>
        <div class="icon-float">
            <ul>
                
              <li><a href="https://facebook.com/Avfashiongroup1/" class="fb1"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                <li><a href="https://instagram.com/av_fashiongroup?utm_source=ig_profile_share&igshid=pbgib6ihzrb1" class="li1"><i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
            </ul>
        </div>
    </section>

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>