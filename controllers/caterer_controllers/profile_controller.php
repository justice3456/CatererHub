<?php
include("../../classes/caterer_classes/profile_class.php");

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
function retrieve_profile_controller () {
    $profile = new profile();
    return $profile->retrieve_profile();
}

function retrieve_profile_images_controller () {
    $profile = new profile();
    return $profile->retrieve_profile_images();
}

function retrieve_specific_post_controller () {
    $profile = new profile();
    return $profile->retrieve_specific_posts();
}

function count_ads_controller () {
    $profile = new profile();
    return $profile->count_ads();
}

function count_posts_controller () {
    $profile = new profile();
    return $profile->count_posts();
}







//--UPDATE--//
function edit_profile_controller ($business_name, $pp_path, $bp_path, $dietary_restrictions, $event_types, $location) {
    $profile = new profile();
    $profile->edit_profile("$business_name", "$pp_path", "$bp_path", "$dietary_restrictions", "$event_types", "$location");
    return true;
}

// function delete_ad_controller ($ad_id) {
//     $ad = new ads();
//     $ad->delete_ad("$ad_id");
//     return true;
// }

?>