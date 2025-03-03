<?php
include("../../classes/eventplanner_classes/account_class.php");

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new customer_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//

// function post_ad_controller($title, $description, $image_path) {
//     $ad = new ads();
//     $ad->make_ad("$title", "$description", "$image_path");
//     return true;
// }


//--SELECT--//
function retrieve_account_controller () {
    $account = new account();
    return $account->retrieve_account();
}

function count_requests_controller () {
    $account = new account();
    return $account->count_requests();
}









//--UPDATE--//

function edit_account_controller($username, $pp_path, $phone, $location) {
    $account = new account();
    $account->edit_account("$username", "$pp_path", "$phone", "$location");
    return true;
}

?>