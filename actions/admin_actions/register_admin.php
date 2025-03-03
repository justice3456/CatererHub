<?php
include ('../../controllers/admin_controllers/register_login_controller.php');

if (isset($_POST['register'])) {

       $password = $_POST['password_harsh']; 
       $email = $_POST['email'];
}



if (login_caterer_controller($password, $email)){
    echo "<script> window.location.href = '../../view/admin/admin_control.php';</script>";


}


