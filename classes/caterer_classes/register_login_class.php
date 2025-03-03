<?php
//connect to database class
require("../../settings/db_class.php");

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
class caterer_register_login extends db_connection
{
	//--INSERT--//
	public function register_caterer($business_name, $password, $business_email, $business_phone, $event_types, $dietary_restrictions, $service_area)
	{
		$ndb = new db_connection();

		$business_name = mysqli_real_escape_string($ndb->db_conn(), $business_name);
		$business_email = mysqli_real_escape_string($ndb->db_conn(), $business_email);
		$business_phone = mysqli_real_escape_string($ndb->db_conn(), $business_phone);
		$event_types = mysqli_real_escape_string($ndb->db_conn(), $event_types);
		$dietary_restrictions = mysqli_real_escape_string($ndb->db_conn(), $dietary_restrictions);
		$service_area = mysqli_real_escape_string($ndb->db_conn(), $service_area);
		$password = mysqli_real_escape_string($ndb->db_conn(), $password);

		$password = password_hash($password, PASSWORD_DEFAULT);

		$users = "SELECT * FROM `Caterers` WHERE `contact_email` = '$business_email';";
		if ($ndb->db_fetch_one($users)) {
			echo "<script>alert('Email already in use'); window.location.href = '../../view/caterers/signup.php';</script>";
		} else {
			$sql = "INSERT INTO `Caterers` (`business_name`, `contact_email`, `contact_phone`, `password`, `event_types`, `dietary_restrictions`, `service_areas`) 
					VALUES ('$business_name', '$business_email', '$business_phone', '$password', '$event_types', '$dietary_restrictions',  '$service_area');";
			$ndb->db_query($sql);

			
		}
	}


	//--SELECT--//
	public function login_caterer($password, $business_email)
	{
		$ndb = new db_connection();


		$business_email = mysqli_real_escape_string($ndb->db_conn(), $business_email);
		$password = mysqli_real_escape_string($ndb->db_conn(), $password);

		$caterer = "SELECT * FROM `Caterers` WHERE `contact_email` = '$business_email';";
		$caterer = $ndb->db_fetch_one($caterer);
		if ($caterer) {

			if (password_verify($password, $caterer['password'])) {
				session_start();
				$_SESSION['cid'] = $caterer['id'];
				$_SESSION['c_email'] = $business_email;



			} else {
				echo "<script>alert('Incorrect email or password'); window.location.href = '../../view/caterers/login.php';</script>";
			}
		} else {
			echo "<script>alert('Email not found'); window.location.href = '../../view/caterers/signup.php';</script>";
		}
	}



	//--UPDATE--//



	//--DELETE--//


}
