<?php
// Include the controller for handling account-related actions
include ('../../controllers/eventplanner_controllers/account_controller.php');

// Check if the form for editing account details has been submitted
if (isset($_POST['edit_account'])) {
    // Retrieve the form data for editing account details
    $username = $_POST['username']; 
    $phone = $_POST['phone_number']; 
    $location = $_POST['location']; 
}

// Function to handle image upload and update
function update_image($upload_folder, $current_file, $existingFilePath = null) {
    if ($current_file) {
        // Get the temporary file path, file name, and file type
        $fileTmpPath = $current_file['tmp_name'];
        $fileName = basename($current_file['name']);
        $fileType = $current_file['type'];

        // Define allowed image types
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        // Check if the file type is allowed
        if (in_array($fileType, $allowedTypes)) {
            // Create a unique file name and set the target file path
            $uniqueFileName = uniqid() . $fileName;
            $targetFilePath = $upload_folder . DIRECTORY_SEPARATOR . $uniqueFileName;

            // Delete the existing image if it exists
            if ($existingFilePath && file_exists($existingFilePath)) {
                if (!unlink($existingFilePath)) {
                    echo "<script>alert('Failed to delete the existing image.'); window.location.href = '../../view/caterers/my_profile.php';</script>";
                    return false;
                }
            }

            // Move the uploaded file to the target folder
            if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
                return $targetFilePath;
            } else {
                echo "<script>alert('Error while moving the file to the target folder.'); window.location.href = '../../view/caterers/my_profile.php';</script>";
                return false;
            }
        } else {
            echo "<script>alert('Invalid file type. Only JPG, PNG, and GIF are allowed.'); window.location.href = '../../view/caterers/my_profile.php';</script>";
            return false;
        }
    } else {
        echo "<script>alert('No file uploaded or there was an error with the file.'); window.location.href = '../../view/caterers/my_profile.php';</script>";
        return false;
    }
}

// Folder where the profile picture will be uploaded
$profile_picture_folder = '../../eventplanner_images/profile_pictures';
// Get the new profile picture uploaded
$new_profile = $_FILES['profile_picture'];
// Update the profile picture and get the new file path
$pp_path = update_image($profile_picture_folder, $new_profile);

// Call the function to edit the account details and redirect to the account page
if (edit_account_controller($username, $pp_path, $phone, $location)){
    echo "<script> window.location.href = '../../view/eventplanner/account.php';</script>";
}
