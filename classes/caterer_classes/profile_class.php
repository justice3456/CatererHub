<?php
//connect to database class
require("../../settings/db_class.php");
session_start();
/**
 *General class to handle all functions 
 */
/**
 *@author David Sampah
 *
 */

//  public function add_brand($a,$b)
// 	{
// 		$ndb = new db_connection();	
// 		$name =  mysqli_real_escape_string($ndb->db_conn(), $a);
// 		$desc =  mysqli_real_escape_string($ndb->db_conn(), $b);
// 		$sql="INSERT INTO `brands`(`brand_name`, `brand_description`) VALUES ('$name','$desc')";
// 		return $this->db_query($sql);
// 	}
class profile extends db_connection
{
	//--INSERT--//
	// public function make_ad($title, $description, $image_path)
	// {
	// 	$ndb = new db_connection();

	// 	$title = mysqli_real_escape_string($ndb->db_conn(), $title);
	// 	$description = mysqli_real_escape_string($ndb->db_conn(), $description);
	// 	$image_path = mysqli_real_escape_string($ndb->db_conn(), $image_path);
	// 	$caterer_id = $_SESSION['cid'];

	// 	$sql = "INSERT INTO `Caterer_Ads` (`caterer_id`, `title`, `description`, `image_path`) VALUES ('$caterer_id', '$title', '$description', '$image_path');";
	// 	$ndb->db_query($sql);
	// }


	//--SELECT--//
	public function retrieve_profile_images()
	{
		$caterer_id = $_SESSION['cid'];
		$ndb = new db_connection();

		$sql = "SELECT * FROM `Caterer_Images` WHERE `caterer_id` = '$caterer_id';";
		return $ndb->db_fetch_one($sql);
	}

	public function retrieve_profile()
	{
		$ndb = new db_connection();
		$caterer_id = $_SESSION['cid'];

		$sql = "SELECT * FROM `Caterers` WHERE `id` = '$caterer_id';";
		return $ndb->db_fetch_one($sql);
	}

	public function retrieve_specific_posts()
	{
		$ndb = new db_connection();
		$caterer_id = $_SESSION['cid'];

		$sql = "SELECT * FROM `Posts` WHERE `caterer_id` = '$caterer_id' ORDER BY `id` DESC;";
		return $ndb->db_fetch_all($sql);
	}

	public function count_posts()
	{
		$ndb = new db_connection();
		$caterer_id = $_SESSION['cid'];

		$sql = "SELECT * FROM `Posts` WHERE `caterer_id` = '$caterer_id';";
		$ndb->db_query($sql);
		return $ndb->db_count();
	}

	public function count_ads()
	{
		$ndb = new db_connection();
		$caterer_id = $_SESSION['cid'];

		$sql = "SELECT * FROM `Caterer_Ads` WHERE `caterer_id` = '$caterer_id';";
		$ndb->db_query($sql);
		return $ndb->db_count();
	}


	//--UPDATE--//
	public function edit_profile($business_name, $pp_path, $bp_path, $dietary_restrictions, $event_types, $location)
	{
		$ndb = new db_connection();

		$caterer_id = $_SESSION['cid'];
		$caterer_id = mysqli_real_escape_string($ndb->db_conn(), $caterer_id);

		if ($business_name) {
			$business_name = mysqli_real_escape_string($ndb->db_conn(), $business_name);

			$sql = "UPDATE `Caterers`
			SET `business_name` = '$business_name'
			WHERE `id` = '$caterer_id';";

			$ndb->db_query($sql);
		}

		if ($dietary_restrictions) {
			$dietary_restrictions = mysqli_real_escape_string($ndb->db_conn(), $dietary_restrictions);
			$sql = "UPDATE `Caterers`
			SET `dietary_restrictions` = '$dietary_restrictions'
			WHERE `id` = '$caterer_id';";

			$ndb->db_query($sql);
		}

		if ($event_types) {
			$event_types = mysqli_real_escape_string($ndb->db_conn(), $event_types);
			$sql = "UPDATE `Caterers`
			SET `event_types` = '$event_types'
			WHERE `id` = '$caterer_id';";
			$ndb->db_query($sql);
		}

		if ($location) {
			$location = mysqli_real_escape_string($ndb->db_conn(), $location);
			$sql = "UPDATE `Caterers`
			SET `service_areas` = '$location'
			WHERE `id` = '$caterer_id';";
			$ndb->db_query($sql);
		}

		//images
		if ($pp_path) {
			$pp_path = mysqli_real_escape_string($ndb->db_conn(), $pp_path);
			$sql = "INSERT INTO `Caterer_Images` (`caterer_id`, `profile_picture_path`)
					VALUES ('$caterer_id', '$pp_path')
					ON DUPLICATE KEY UPDATE 
    				`profile_picture_path` = '$pp_path';";
			$ndb->db_query($sql);
		}

		if ($bp_path) {
			$$bp_path = mysqli_real_escape_string($ndb->db_conn(), $bp_path);
			$sql = "INSERT INTO `Caterer_Images` (`caterer_id`, `banner_picture_path`)
					VALUES ('$caterer_id', '$bp_path')
					ON DUPLICATE KEY UPDATE 
    				`banner_picture_path` = '$bp_path';";
			$ndb->db_query($sql);
		}
	}



	//--DELETE--//
	// public function delete_ad($ad_id)
	// {
	// 	$ndb = new db_connection();
	// 	$ad_id = mysqli_real_escape_string($ndb->db_conn(), $ad_id);
	// 	$sql = "SELECT `image_path` FROM `Caterer_Ads` WHERE `ad_id` = '$ad_id' ";

	// 	$ad = $ndb->db_fetch_one($sql);

	// 	//deleting image
	// 	function delete_image($existingFilePath)
	// 	{
	// 		if ($existingFilePath && file_exists($existingFilePath)) {
	// 			if (!unlink($existingFilePath)) {
	// 				echo "<script>alert('Failed to delete the existing image.'); window.location.href = '../../view/caterers/manage_ads.php';</script>";
	// 				return false;
	// 			}
	// 		}
	// 	}

	// 	delete_image($ad['image_path']);

	// 	//deleting from database
	// 	$sql = "DELETE FROM `Caterer_Ads` WHERE `ad_id` = '$ad_id';";
	// 	$ndb->db_query($sql);
	// }
}
