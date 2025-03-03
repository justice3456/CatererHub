<?php
include('../../controllers/eventplanner_controllers/account_controller.php');

// Retrieve account details using the account controller
$account = retrieve_account_controller();

// Count the number of requests using the requests controller
$request_count = count_requests_controller();


// $ad_count = count_ads_controller();


