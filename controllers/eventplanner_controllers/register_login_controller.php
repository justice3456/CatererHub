<?php
include("../../classes/eventplanner_classes/register_login_class.php");

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new customer_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//

function register_eventplanner_controller($user_name, $email, $phone, $password) {
    $register_caterer = new eventplanner_register_login();

    $register_caterer->register_eventplanner("$user_name", "$email", "$phone", "$password");
    return true;
}

function login_eventplanner_controller($password, $cred) {
    $login_eventplanner = new eventplanner_register_login();

    $login_eventplanner->login_eventplanner("$password", "$cred");
    return true;
}


?>