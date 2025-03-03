<?php
include('../../controllers/caterer_controllers/ads_controller.php');

if (isset($_POST['delete_confirmed'])) {
    $ad_id = $_POST['ad_id']; 
}

// Delete the ad and redirect.
if (delete_ad_controller($ad_id)) {
    echo "<script> window.location.href = '../../view/caterers/manage_ads.php';</script>";
}
?>
