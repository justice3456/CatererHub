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
class promote_ads extends db_connection
{
	//--INSERT--//
	public function promote_ad($ad_id)
	{
		$ndb = new db_connection();

		$current_date = date("Y-m-d");
		$ad_id = mysqli_real_escape_string($ndb->db_conn(), $ad_id);

		$current_date = mysqli_real_escape_string($ndb->db_conn(), $current_date);

		$sql = "UPDATE `Caterer_Ads` 
        		SET `promotion_status` = 'promotion', `promotion_start_date` = '$current_date' 
        		WHERE `ad_id` = '$ad_id';";


		$ndb->db_query($sql);
	}


	//--SELECT--//
	public function retrieve_ads()
	{
		$ndb = new db_connection();
		$caterer_id = $_SESSION['cid'];

		$sql = "SELECT * FROM `Caterer_Ads` WHERE `caterer_id` = '$caterer_id' ORDER BY `ad_id` DESC;";
		return $ndb->db_fetch_all($sql);
	}


	//--UPDATE--//
	public function edit_ad($title, $description, $image_path,$event_type, $ad_id)
	{
		$ndb = new db_connection();



		if ($title) {
			$title = mysqli_real_escape_string($ndb->db_conn(), $title);

			$sql = "UPDATE `Caterer_Ads`
			SET `title` = '$title'
			WHERE `ad_id` = '$ad_id';";

			$ndb->db_query($sql);
		}

		if ($description) {
			$description = mysqli_real_escape_string($ndb->db_conn(), $description);
			$sql = "UPDATE `Caterer_Ads`
			SET `description` = '$description'
			WHERE `ad_id` = '$ad_id';";

			$ndb->db_query($sql);
		}

		if ($image_path) {
			$image_path = mysqli_real_escape_string($ndb->db_conn(), $image_path);
			$sql = "UPDATE `Caterer_Ads`
			SET `image_path` = '$image_path'
			WHERE `ad_id` = '$ad_id';";
			$ndb->db_query($sql);
		}

		if ($event_type) {
			$event_type = mysqli_real_escape_string($ndb->db_conn(), $event_type);
			$sql = "UPDATE `Caterer_Ads`
			SET `event_types` = '$event_type'
			WHERE `ad_id` = '$ad_id';";

			$ndb->db_query($sql);
		}
	}



	//--DELETE--//
	public function delete_ad($ad_id)
	{
		$ndb = new db_connection();
		$ad_id = mysqli_real_escape_string($ndb->db_conn(), $ad_id);
		$sql = "SELECT `image_path` FROM `Caterer_Ads` WHERE `ad_id` = '$ad_id' ";

		$ad = $ndb->db_fetch_one($sql);

		//deleting image
		function delete_image($existingFilePath)
		{
			if ($existingFilePath && file_exists($existingFilePath)) {
				if (!unlink($existingFilePath)) {
					echo "<script>alert('Failed to delete the existing image.'); window.location.href = '../../view/caterers/manage_ads.php';</script>";
					return false;
				}
			}
		}

		delete_image($ad['image_path']);

		//deleting from database
		$sql = "DELETE FROM `Caterer_Ads` WHERE `ad_id` = '$ad_id';";
		$ndb->db_query($sql);
	}
}
