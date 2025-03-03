<?php
// Include the ads controller.
include('../../controllers/caterer_controllers/ads_controller.php');
session_start(); // Start session.

// Check if changes are submitted.
if (isset($_POST['save_change'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $ad_id = $_POST['ad_id'];
    $event_type = $_POST['event_type'];
    $existing_file_path = $_POST['existing_image'];
}

// Function to handle image updates.
function update_image($upload_folder, $existingFilePath) {
    if (isset($_FILES['image'])) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = basename($_FILES['image']['name']);
        $fileType = $_FILES['image']['type'];

        // Allowed image types.
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($fileType, $allowedTypes)) {
            $uniqueFileName = uniqid() . $fileName;
            $targetFilePath = $upload_folder . DIRECTORY_SEPARATOR . $uniqueFileName;

            // Delete existing image if it exists.
            if ($existingFilePath && file_exists($existingFilePath)) {
                if (!unlink($existingFilePath)) {
                    echo "<script>alert('Failed to delete existing image.'); window.location.href = '../../view/caterers/manage_ads.php';</script>";
                    return false;
                }
            }

            // Move uploaded file.
            if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
                return $targetFilePath;
            } else {
                echo "<script>alert('Error moving file.'); window.location.href = '../../view/caterers/manage_ads.php';</script>";
                return false;
            }
        } else {
            echo "<script>alert('Invalid file type.'); window.location.href = '../../view/caterers/manage_ads.php';</script>";
            return false;
        }
    } else {
        echo "<script>alert('No file uploaded or an error occurred.'); window.location.href = '../../view/caterers/manage_ads.php';</script>";
        return false;
    }
}

// Update image path.
$ad_folder = '../../caterer_images/ad_images/';
$image_path = update_image($ad_folder, $existing_file_path);

// Update ad details and redirect.
if (edit_ad_controller($title, $description, $image_path, $event_type, $ad_id)) {
    echo "<script> window.location.href = '../../view/caterers/manage_ads.php';</script>";
}
?>
