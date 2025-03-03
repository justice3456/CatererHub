<?php
include '../../controllers/eventplanner_controllers/home_controller.php';

$ads;

if (isset($_POST['event_filter'])) {
    $event_types = $_POST['subscription'];
    $business_name = Null;
}

echo $event_types;


// retrieve_all_ads ($business_name, $event_types);
if (retrieve_all_ads ($business_name, $event_types)){
    $ads = retrieve_all_ads ($business_name, $event_types);
    echo "<script> window.location.href = '../../view/eventplanner/home.php';</script>";
}
