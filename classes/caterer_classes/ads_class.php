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
// Class to handle all ad-related functions (creating, retrieving, editing, deleting ads)
class ads extends db_connection
{
    //--INSERT--//
    // Create a new ad with title, description, event type, and image path
    public function make_ad($title, $description, $event_type, $image_path)
    {
        $ndb = new db_connection();

        // Sanitize input data to prevent SQL injection
        $title = mysqli_real_escape_string($ndb->db_conn(), $title);
        $description = mysqli_real_escape_string($ndb->db_conn(), $description);
        $image_path = mysqli_real_escape_string($ndb->db_conn(), $image_path);
        $event_type = mysqli_real_escape_string($ndb->db_conn(), $event_type);
        $caterer_id = $_SESSION['cid']; // Caterer ID from session

        // Insert the new ad into the Caterer_Ads table
        $sql = "INSERT INTO `Caterer_Ads` (`caterer_id`, `title`, `description`, `image_path`, `event_types`) 
                VALUES ('$caterer_id', '$title', '$description', '$image_path', '$event_type');";
        $ndb->db_query($sql);
    }

    //--SELECT--//
    // Retrieve all ads for the logged-in caterer (based on caterer ID)
    public function retrieve_ads()
    {
        $ndb = new db_connection();
        $caterer_id = $_SESSION['cid']; // Caterer ID from session

        // Query to get all ads from Caterer_Ads table for this caterer
        $sql = "SELECT * FROM `Caterer_Ads` WHERE `caterer_id` = '$caterer_id' ORDER BY `ad_id` DESC;";
        return $ndb->db_fetch_all($sql); // Return all the ads
    }

    //--UPDATE--//
    // Edit an existing ad by updating its title, description, image path, or event type
    public function edit_ad($title, $description, $image_path, $event_type, $ad_id)
    {
        $ndb = new db_connection();

        // Update the ad's title if provided
        if ($title) {
            $title = mysqli_real_escape_string($ndb->db_conn(), $title);
            $sql = "UPDATE `Caterer_Ads` SET `title` = '$title' WHERE `ad_id` = '$ad_id';";
            $ndb->db_query($sql);
        }

        // Update the ad's description if provided
        if ($description) {
            $description = mysqli_real_escape_string($ndb->db_conn(), $description);
            $sql = "UPDATE `Caterer_Ads` SET `description` = '$description' WHERE `ad_id` = '$ad_id';";
            $ndb->db_query($sql);
        }

        // Update the ad's image path if provided
        if ($image_path) {
            $image_path = mysqli_real_escape_string($ndb->db_conn(), $image_path);
            $sql = "UPDATE `Caterer_Ads` SET `image_path` = '$image_path' WHERE `ad_id` = '$ad_id';";
            $ndb->db_query($sql);
        }

        // Update the ad's event type if provided
        if ($event_type) {
            $event_type = mysqli_real_escape_string($ndb->db_conn(), $event_type);
            $sql = "UPDATE `Caterer_Ads` SET `event_types` = '$event_type' WHERE `ad_id` = '$ad_id';";
            $ndb->db_query($sql);
        }
    }

    //--DELETE--//
    // Delete an ad by removing it from the database and its associated image
    public function delete_ad($ad_id)
    {
        $ndb = new db_connection();
        $ad_id = mysqli_real_escape_string($ndb->db_conn(), $ad_id);

        // Fetch the image path associated with the ad
        $sql = "SELECT `image_path` FROM `Caterer_Ads` WHERE `ad_id` = '$ad_id';";
        $ad = $ndb->db_fetch_one($sql);

        // Function to delete the ad's image from the server
        function delete_image($existingFilePath)
        {
            if ($existingFilePath && file_exists($existingFilePath)) {
                if (!unlink($existingFilePath)) {
                    echo "<script>alert('Failed to delete the existing image.'); window.location.href = '../../view/caterers/manage_ads.php';</script>";
                    return false;
                }
            }
        }

        // Delete the image file
        delete_image($ad['image_path']);

        // Delete the ad from the database
        $sql = "DELETE FROM `Caterer_Ads` WHERE `ad_id` = '$ad_id';";
        $ndb->db_query($sql);
    }
}
