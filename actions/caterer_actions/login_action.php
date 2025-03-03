<?php
include ('../../controllers/caterer_controllers/register_login_controller.php');

if (isset($_POST['login'])) {
       
       $password = $_POST['password']; 
       $business_email = $_POST['email']; 
}



if (login_caterer_controller( $password, $business_email)){
       echo "<script> window.location.href = '../../view/caterers/business_dashboard.php';</script>";
}


