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
	public function register_caterer($password, $admin_email)
	{
		$ndb = new db_connection();

		$admin_email = mysqli_real_escape_string($ndb->db_conn(), $admin_email);
		$password = mysqli_real_escape_string($ndb->db_conn(), $password);

		$password = password_hash($password, PASSWORD_DEFAULT);

		
		
			$sql = "INSERT INTO `Admin` (`email`, `password_hash`) 
					VALUES ('$admin_email', '$password');";
			$ndb->db_query($sql);

			
		
	}


	//--SELECT--//
	public function login_caterer($password, $business_email)
	{
		$ndb = new db_connection();


		$business_email = mysqli_real_escape_string($ndb->db_conn(), $business_email);
		$password = mysqli_real_escape_string($ndb->db_conn(), $password);

		$caterer = "SELECT * FROM `Admin` WHERE `email` = '$business_email';";
		$caterer = $ndb->db_fetch_one($caterer);
		if ($caterer) {

			if (password_verify($password, $caterer['password_hash'])) {
				session_start();
				$_SESSION['aid'] = $caterer['id'];
				$_SESSION['a_email'] = $business_email;
				return true;



			} else {
				echo "<script>alert('Incorrect email or password'); window.location.href = '../../index.php';</script>";
			}
		} else {
			echo "<script>alert('Email not found'); window.location.href = '../index.php';</script>";
		}
	}



	//--UPDATE--//



	//--DELETE--//


}
