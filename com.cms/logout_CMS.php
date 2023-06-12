<?php
session_start();
unset($_SESSION['username']);

session_destroy();

echo "<script> alert('Logged Out Successfully'); setTimeout(function(){ window.location='home_CMS.php'},0);</script>";




?>