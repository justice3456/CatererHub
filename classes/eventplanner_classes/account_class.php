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
class account extends db_connection
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

	public function retrieve_account()
	{
		$ndb = new db_connection();
		$event_planner_id = $_SESSION['eid'];

		$sql = "SELECT * FROM `Event_Planners` WHERE `id` = '$event_planner_id';";
		return $ndb->db_fetch_one($sql);
	}

	public function count_requests()
	{
		$ndb = new db_connection();
		$event_planner_id = $_SESSION['eid'];

		$sql = "SELECT * FROM `Ad_Interactions` WHERE `event_planner_id` = '$event_planner_id';";
		$ndb->db_query($sql);
		return $ndb->db_count();
	}


	//--UPDATE--//
	public function edit_account($username, $pp_path, $phone, $location)
	{
		$ndb = new db_connection();

		$eventplanner_id = $_SESSION['eid'];
		$eventplanner_id = mysqli_real_escape_string($ndb->db_conn(), $eventplanner_id);

		if ($username) {
			$username = mysqli_real_escape_string($ndb->db_conn(), $username);

			$sql = "UPDATE `Event_Planners`
			SET `username` = '$username'
			WHERE `id` = '$eventplanner_id';";
			$ndb->db_query($sql);
		}

		if ($phone) {
			$phone = mysqli_real_escape_string($ndb->db_conn(), $phone);

			$sql = "UPDATE `Event_Planners`
			SET `phone_number` = '$phone'
			WHERE `id` = '$eventplanner_id';";
			$ndb->db_query($sql);
		}

		if ($location) {
			$location = mysqli_real_escape_string($ndb->db_conn(), $location);

			$sql = "UPDATE `Event_Planners`
			SET `location` = '$location'
			WHERE `id` = '$eventplanner_id';";
			$ndb->db_query($sql);
		}

		

		//images
		if ($pp_path) {
			$pp_path = mysqli_real_escape_string($ndb->db_conn(), $pp_path);

			$sql = "UPDATE `Event_Planners`
			SET `image_path` = '$pp_path'
			WHERE `id` = '$eventplanner_id';";
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
