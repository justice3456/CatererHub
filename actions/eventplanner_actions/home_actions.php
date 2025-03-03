<?php
include '../../controllers/eventplanner_controllers/home_controller.php';

$ads;
if (isset($_POST['search_by_name'])) {
    $business_name = $_POST['business_name'];
    $event_types = Null;
}
//  elseif (isset($_POST['event_filter'])) {
//     $event_types = $_POST['event_types'];
//     $business_name = Null;
// }


// retrieve_all_ads ($business_name, $event_types);
if (retrieve_all_ads ($business_name, $event_types)){
    $ads = retrieve_all_ads ($business_name, $event_types);
    echo "<script> window.location.href = '../../view/eventplanner/home.php';</script>";
}
