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
class home extends db_connection
{


	//--SELECT--//
	public function retrieve_all_ads($business_name=Null, $event_types=Null)
	{
		if ($business_name) {
			$ndb = new db_connection();
			echo 'this' . $business_name . '  ';
			$business_name = mysqli_real_escape_string($ndb->db_conn(), $business_name);

			$sql = "SELECT `c`.`business_name`, `ca`.`event_types`, `ca`.`image_path`, `c`.`id`, `ca`.`ad_id`, `ca`.`description`, `c`.`contact_phone`, `ca`.`caterer_id`
            FROM `Caterer_Ads` AS `ca`
            JOIN `Caterers` AS `c` ON `ca`.`caterer_id` = `c`.`id`
            WHERE `c`.`business_name` = '$business_name'
            ORDER BY `ca`.`ad_id` DESC;";

			$_SESSION['home_ads'] = $ndb->db_fetch_all($sql);
			return true;
		} elseif ($event_types) {
			
			$ndb = new db_connection();
			$event_types = mysqli_real_escape_string($ndb->db_conn(), $event_types);

			$sql = "SELECT `c`.`business_name`, `ca`.`event_types`, `ca`.`image_path`, `c`.`id`, `ca`.`ad_id`, `ca`.`description`, `c`.`contact_phone`, `ca`.`caterer_id`
            FROM `Caterer_Ads` AS `ca`
            JOIN `Caterers` AS `c` ON `ca`.`caterer_id` = `c`.`id`
            WHERE `ca`.`event_types` = '$event_types'
            ORDER BY `ca`.`ad_id` DESC;";

			$_SESSION['home_ads'] = $ndb->db_fetch_all($sql);
			return true;
		}

		$ndb = new db_connection();
		// $caterer_id = $_SESSION['cid'];
		$sql = "SELECT c.business_name, ca.event_types, ca.image_path, c.id, ca.ad_id, ca.description, c.contact_phone, ca.caterer_id
				FROM Caterer_Ads ca
				JOIN Caterers c ON ca.caterer_id = c.id
				ORDER BY ca.ad_id DESC;";

		$_SESSION['all_home_ads'] = $ndb->db_fetch_all($sql);
		return true;
	}

	public function retrieve_specific_ad($business_name=Null, $event_types=Null) {
		
	}
}
