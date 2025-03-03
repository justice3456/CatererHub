<?php
include '../../controllers/eventplanner_controllers/save_controller.php';

session_start();
if (!$_SESSION['eid']) {
    echo "<script>alert('Login before you can save an ad'); window.location.href = '../../view/eventplanner/login.php';</script>";
}

// Check if ad ID and caterer ID are posted and store them
if (isset($_POST['ad_id'])) {
    $ad_id = $_POST['ad_id'];
    $caterer_id = $_POST['caterer_id'];
}

// Call the controller function to save the ad and show a success message
if (save_ad_controller($ad_id, $caterer_id)) {
    echo "<script>alert('Request made successfully'); window.location.href = '../../view/eventplanner/home.php';</script>";
}
