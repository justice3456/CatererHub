<?php
include '../../controllers/caterer_controllers/promote_ad_controller.php';

$ad_id = $_GET['param'];

if (promote_ad($ad_id)){
    echo "<script> window.location.href = '../../view/caterers/manage_ads.php';</script>";
}
