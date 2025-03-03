<?php
// Include the profile controller.
include('../../controllers/caterer_controllers/profile_controller.php');

// Check if profile is being edited.
if (isset($_POST['edit_profile'])) {
    $business_name = $_POST['business_name'];
    $dietary_restrictions = isset($_POST['dietary_restrictions']) ? implode(',', $_POST['dietary_restrictions']) : null;
    $event_types = isset($_POST['event_types']) ? implode(',', $_POST['event_types']) : null;
    $location = $_POST['service_area'];
}

// Function to handle image uploads.
function update_image($upload_folder, $current_file, $existingFilePath = null) {
    if ($current_file) {
        $fileTmpPath = $current_file['tmp_name'];
        $fileName = basename($current_file['name']);
        $fileType = $current_file['type'];

        // Allowed image types.
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($fileType, $allowedTypes)) {
            $uniqueFileName = uniqid() . $fileName;
            $targetFilePath = $upload_folder . DIRECTORY_SEPARATOR . $uniqueFileName;

            // Delete existing image if needed.
            if ($existingFilePath && file_exists($existingFilePath)) {
                if (!unlink($existingFilePath)) {
                    echo "<script>alert('Failed to delete existing image.'); window.location.href = '../../view/caterers/my_profile.php';</script>";
                    return false;
                }
            }

            // Move the uploaded file.
            if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
                return $targetFilePath;
            } else {
                echo "<script>alert('Error moving file.'); window.location.href = '../../view/caterers/my_profile.php';</script>";
                return false;
            }
        } else {
            echo "<script>alert('Invalid file type.'); window.location.href = '../../view/caterers/my_profile.php';</script>";
            return false;
        }
    } else {
        echo "<script>alert('No file uploaded or an error occurred.'); window.location.href = '../../view/caterers/my_profile.php';</script>";
        return false;
    }
}

// Update profile and banner pictures.
$profile_picture_folder = '../../caterer_images/profile_pictures';
$new_profile = $_FILES['profile_picture'];
$pp_path = update_image($profile_picture_folder, $new_profile);

$profile_banner_folder = '../../caterer_images/profile_banner';
$new_banner = $_FILES['banner_picture'];
$bp_path = update_image($profile_banner_folder, $new_banner);

// Edit profile and redirect.
if (edit_profile_controller($business_name, $pp_path, $bp_path, $dietary_restrictions, $event_types, $location)) {
    echo "<script> window.location.href = '../../view/caterers/my_profile.php';</script>";
}
?>
