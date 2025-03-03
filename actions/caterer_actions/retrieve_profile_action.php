<?php
include('../../controllers/caterer_controllers/profile_controller.php');

// Retrieve the caterer's profile information
$profile = retrieve_profile_controller();

// Retrieve the profile images of the caterer
$profile_images = retrieve_profile_images_controller();

// Retrieve specific posts related to the caterer
$all_specific_posts = retrieve_specific_post_controller();

// Get the count of ads created by the caterer
$ad_count = count_ads_controller();

// Get the count of posts made by the caterer
$post_count = count_posts_controller();

