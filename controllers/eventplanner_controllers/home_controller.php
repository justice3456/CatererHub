<?php
include("../../classes/eventplanner_classes/home_class.php");

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

function retrieve_all_ads ($business_name, $event_types) {
    $ad = new home();
    return $ad->retrieve_all_ads($business_name, $event_types);
}













// function edit_ad_controller ($title, $description,$image_path, $ad_id) {
//     $ad = new ads();
//     $ad->edit_ad("$title", "$description", "$image_path","$ad_id");
//     return true;
// }

// function delete_ad_controller ($ad_id) {
//     $ad = new ads();
//     $ad->delete_ad("$ad_id");
//     return true;
// }

// ?>