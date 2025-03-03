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
class posts extends db_connection
{
	//--INSERT--//
	public function create_post($post_text, $image_path, $video_path)
	{
		$ndb = new db_connection();





		if ($image_path) {
			$post_text = mysqli_real_escape_string($ndb->db_conn(), $post_text);
			$image_path = mysqli_real_escape_string($ndb->db_conn(), $image_path);
			$caterer_id = $_SESSION['cid'];

			$sql = "INSERT INTO `Posts` (`caterer_id`,`content`, `image_path`) VALUES ('$caterer_id', '$post_text','$image_path');";
			$ndb->db_query($sql);
		} elseif ($video_path) {
			$post_text = mysqli_real_escape_string($ndb->db_conn(), $post_text);
			$video_path = mysqli_real_escape_string($ndb->db_conn(), $video_path);
			$caterer_id = $_SESSION['cid'];

			$sql = "INSERT INTO `Posts` (`caterer_id`,`content`, `video_path`) VALUES ('$caterer_id', '$post_text','$video_path');";
			$ndb->db_query($sql);
		} else {
			$caterer_id = $_SESSION['cid'];
			$sql = "INSERT INTO `Posts` (`caterer_id`,`content`) VALUES ('$caterer_id', '$post_text');";
			$ndb->db_query($sql);
		}
	}


	//--SELECT--//
	public function retrieve_specific_posts()
	{
		$ndb = new db_connection();
		$caterer_id = $_SESSION['cid'];

		$sql = "SELECT * FROM `Posts` WHERE `caterer_id` = '$caterer_id' ORDER BY `id` DESC;";
		return $ndb->db_fetch_all($sql);
	}

	public function retrieve_all_posts()
	{
		$ndb = new db_connection();
		$caterer_id = $_SESSION['cid'];

		$sql = "SELECT p.*, c.*, ci.profile_picture_path, ci.banner_picture_path
				FROM Posts p
				JOIN Caterers c ON p.caterer_id = c.id
				JOIN Caterer_Images ci ON p.caterer_id = ci.caterer_id
				ORDER BY p.id DESC;";
		return $ndb->db_fetch_all($sql);
	}


	//--UPDATE--//
	public function edit_ad($title, $description, $image_path, $ad_id)
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
