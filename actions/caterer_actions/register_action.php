<?php
include ('../../controllers/caterer_controllers/register_login_controller.php');

if (isset($_POST['register'])) {
       $business_name = $_POST['business_name']; 
       $password = $_POST['password']; 
       $business_email = $_POST['email']; 
       $business_phone = $_POST['business_phone']; 
       $event_types = $_POST['events']; 
       $dietary_restrictions = isset($_POST['dietary_restrictions']) ? implode(',', $_POST['dietary_restrictions']) : null;
       $service_area = $_POST['service_area']; 
}



if (register_caterer_controller($business_name, $password, $business_email, $business_phone, $event_types, $dietary_restrictions, $service_area)){
       echo "<script> window.location.href = '../../view/caterers/login.php';</script>";
}


