<?php
include("../../classes/eventplanner_classes/retrieve_featured_class.php");



// function save_ad_controller ($ad_id, $caterer_id) {
//     $ad = new save();
//     return $ad->save_ad("$ad_id", "$caterer_id");
// }

function retrieve_featured_controller () {
    $featured = new featured();
    return $featured->retrieve_featured();
}

// function delete_request_controller($request_id) {
//     $request = new save();
//     return $request->delete_requests($request_id);
// }