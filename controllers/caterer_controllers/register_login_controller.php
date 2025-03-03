<?php
include("../../classes/caterer_classes/register_login_class.php");

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new customer_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//

function register_caterer_controller($business_name, $password, $business_email, $business_phone, $event_types, $dietary_restrictions, $service_area) {
    $register_caterer = new caterer_register_login();

    $register_caterer->register_caterer("$business_name", "$password", "$business_email", "$business_phone", "$event_types", "$dietary_restrictions", "$service_area");
    return true;
}

function login_caterer_controller($password, $business_email) {
    $login_caterer = new caterer_register_login();

    $login_caterer->login_caterer("$password", "$business_email");
    return true;
}


?>