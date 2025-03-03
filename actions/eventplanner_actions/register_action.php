<?php
include ('../../controllers/eventplanner_controllers/register_login_controller.php');

if (isset($_POST['register'])) {
       $user_name = $_POST['name']; 
       $email = $_POST['email']; 
       $phone = $_POST['phone']; 
       $password = $_POST['password']; 

}

if (register_eventplanner_controller($user_name, $email, $phone, $password)){
       echo "<script> window.location.href = '../../view/eventplanner/login.php';</script>";
}


