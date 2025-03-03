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
class featured extends db_connection
{

	//--SELECT--//
	public function retrieve_featured() {
		$ndb = new db_connection();
		$eid = $_SESSION['eid'];
		$eid = mysqli_real_escape_string($ndb->db_conn(), $eid);

		$sql = "SELECT * FROM `Caterers` WHERE `featured_status`= 'featured';";
		return $ndb->db_fetch_all($sql);
	}

	//--INSERT--//
	public function save_ad($ad_id,$caterer_id)
	{
		$ndb = new db_connection();
		$eid = $_SESSION['eid'];
		$ad_id = mysqli_real_escape_string($ndb->db_conn(), $ad_id);
		$caterer_id = mysqli_real_escape_string($ndb->db_conn(), $caterer_id);
		$eid = mysqli_real_escape_string($ndb->db_conn(), $eid);

		$sql = "SELECT * FROM `Ad_Interactions` WHERE `ad_id` = '$ad_id' AND `event_planner_id` = '$eid';";
		$ndb->db_query($sql);

		if ($ndb->db_count() > 0) {
			echo "<script>alert('Service already requested'); window.location.href = '../../view/eventplanner/home.php';</script>";
		} else {
			$sql = "INSERT INTO `Ad_Interactions` (`ad_id`, `event_planner_id`, `caterer_id`)
					VALUES ('$ad_id', '$eid', '$caterer_id');";
			$ndb->db_query($sql);
			return true;
		}
	}

	//--DELETE--//
	public function delete_requests($request_id)
	{
		$ndb = new db_connection();
		$request_id = mysqli_real_escape_string($ndb->db_conn(), $request_id);

		$sql = "DELETE FROM `Ad_Interactions` WHERE `id` = $request_id;";
		$ndb->db_query($sql);
		return true;
	}
	
}
