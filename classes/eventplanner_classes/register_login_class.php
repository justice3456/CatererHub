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
class eventplanner_register_login extends db_connection
{
	//--INSERT--//
	public function register_eventplanner($user_name, $email, $phone, $password)
	{
		$ndb = new db_connection();

		$user_name = mysqli_real_escape_string($ndb->db_conn(), $user_name);
		$email = mysqli_real_escape_string($ndb->db_conn(), $email);
		$phone = mysqli_real_escape_string($ndb->db_conn(), $phone);
		$password = mysqli_real_escape_string($ndb->db_conn(), $password);

		$password = password_hash($password, PASSWORD_DEFAULT);

		$user_email = "SELECT * FROM `Event_Planners` WHERE `email` = '$email';";
		$user = "SELECT * FROM `Event_Planners` WHERE `username` = '$user_name';";
		$user_phone = "SELECT * FROM `Event_Planners` WHERE `phone_number` = '$phone';";

		if ($ndb->db_fetch_one($user_email)) {
			echo "<script>alert('Email already in use'); window.location.href = '../../view/eventplanner/signup.php';</script>";
		} elseif ($ndb->db_fetch_one($user)) {
			echo "<script>alert('User name already in use'); window.location.href = '../../view/eventplanner/signup.php';</script>";
		} elseif ($ndb->db_fetch_one($user_phone)) {
			echo "<script>alert('Phone number is in use'); window.location.href = '../../view/eventplanner/signup.php';</script>";
		} else {
			$sql = "INSERT INTO `Event_Planners` (`username`, `email`, `phone_number`, `password`) 
					VALUES ('$user_name', '$email', '$phone', '$password');";
			$ndb->db_query($sql);
		}
	}


	//--SELECT--//
	public function login_eventplanner($password, $cred)
	{
		$ndb = new db_connection();


		$email = mysqli_real_escape_string($ndb->db_conn(), $cred);
		$password = mysqli_real_escape_string($ndb->db_conn(), $password);

		$event_planner = "SELECT * FROM `Event_Planners` WHERE `email` = '$cred' OR `phone_number` = '$cred';";
		$event_planner = $ndb->db_fetch_one($event_planner);
		if ($event_planner) {

			if (password_verify($password, $event_planner['password'])) {
				
				$_SESSION['eid'] = $event_planner['id'];
			} else {
				echo "<script>alert('Incorrect credentials, check email or phone number and password '); window.location.href = '../../view/eventplanner/login.php';</script>";
			}
		} else {
			echo "<script>alert('Email not found'); window.location.href = '../../view/eventplanner/signup.php';</script>";
		}
	}



	//--UPDATE--//



	//--DELETE--//


}
