<?php
include ('../../controllers/eventplanner_controllers/register_login_controller.php');

if (isset($_POST['login'])) {
       $password = $_POST['password']; 
       $cred = $_POST['email']; 
}



if (login_eventplanner_controller( $password, $cred)){
       echo "<script> window.location.href = '../../view/eventplanner/home.php';</script>";
}


