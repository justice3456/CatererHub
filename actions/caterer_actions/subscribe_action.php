<?php
include '../../controllers/caterer_controllers/subscribe_controller.php';

// $ad_id = $_GET['param'];

if (subscribe_controller()){
    echo "<script> window.location.href = '../../view/caterers/business_dashboard.php';</script>";
}
