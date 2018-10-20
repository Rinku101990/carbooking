<?php
session_start();
session_destroy();
setcookie('username',$username, time()-1);
setcookie('password',$password, time()-1);
header("location:http://avfashiongroup.in/av-admin");
?>