<?php
// Include the ads controller.
include('../../controllers/caterer_controllers/ads_controller.php');
session_start();

// Check if the 'post_ad' button was clicked and retrieve form data.
if (isset($_POST['post_ad'])) {
    $title = $_POST['title']; 
    $description = $_POST['description']; 
    $event_type = $_POST['event_type'];
}

// Function to handle image upload and storage.
function store_image($upload_folder) {
    // Create the folder if it doesn't exist.
    if (!is_dir($upload_folder)) {
        mkdir($upload_folder, 0777, true); 
    }

    // Check if an image is uploaded.
    if (isset($_FILES['image'])) {
        $fileTmpPath = $_FILES['image']['tmp_name'];   
        $fileName = basename($_FILES['image']['name']); 
        $fileType = $_FILES['image']['type'];          

        // Define allowed image types.
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        // Check if the file type is allowed.
        if (in_array($fileType, $allowedTypes)) {

            // Generate a unique file name for the image.
            $uniqueFileName = uniqid() . $fileName;

            // Define the target file path for the uploaded image.
            $targetFilePath = $upload_folder . DIRECTORY_SEPARATOR . $uniqueFileName;

            // Move the uploaded file to the target folder.
            if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
                return $targetFilePath;
            } else {
                echo "<script> alert('Error while moving the file to the target folder.') window.location.href = '../../view/caterers/advertisment.php';</script>";
                return false;
            }
        } else {
            // Show error if the file type is not allowed.
            echo "<script> alert('Invalid file type. Only JPG, PNG, and GIF are allowed.') window.location.href = '../../view/caterers/advertisment.php';</script>";
            return false;
        }
    } else {
        // Show error if no file was uploaded.
        echo "<script> alert('No file uploaded or there was an error with the file.') window.location.href = '../../view/caterers/advertisment.php';</script>";
        return false;
    }
}

// Define the folder for storing ads images.
$ad_folder = '../../caterer_images/ad_images/';
$image_path = store_image($ad_folder);

// Post the ad and redirect to the manage ads page.
if (post_ad_controller($title, $description, $event_type, $image_path)) {
    echo "<script> window.location.href = '../../view/caterers/manage_ads.php';</script>";
}
?>
