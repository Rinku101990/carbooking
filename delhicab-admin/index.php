<?php 
session_start();

 include('connection.php');
 if(isset($_SESSION['userID'])) // If session is not set then redirect to Login Page
       {
           header("Location:dashboard.php");  
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
    <title>Delhi Cab Admin Panel</title>
    <link href="css/login.css" rel="stylesheet" media="screen">
    <link href="css/animate.css" rel="stylesheet" media="screen">
    <link href="fonts/icomoon/icomoon.css" rel="stylesheet">
</head>

<body>
    <form action="validate.php" method="post" id="wrapper">
        <div id="box" class="animated bounceIn">
            <div id="top_header" >
                <h3><img src="img/logo.png" alt="AV Fashion Group Logo"></h3>
                <h5 style="color: #8e1a1a;font-weight:600">Sign in to continue to your<br>Delhi Cab Account.</h5>
                
                </div>
            <div id="inputs" style="margin: 5px auto 30px auto;">
                <?php if(isset($_GET['msg'])){?>
                <p style="text-align:center; color:red">*Incorrect username or password</p><?php }?>
                <div class="form-control">
                    <input name="username" type="text" placeholder="Username" required> <i class="icon-email"></i></div>
                <div class="form-control">
                    <input name="password" type="password" placeholder="Password" required> <i class="icon-lock2"></i></div>
                <input name="Sign" type="submit" value="Sign In">
            </div>
           
        </div>
    </form>
</body>

</html>