<?php
// Include the posts controller.
include('../../controllers/caterer_controllers/posts_controller.php');
session_start(); // Start session.
$post_text = $_POST['post_text']; // Get the post text.

// Function to handle file upload or update.
function update_image($upload_folder, $current_file, $existingFilePath = null)
{
    if ($current_file && $current_file['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $current_file['tmp_name'];
        $fileName = basename($current_file['name']);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Allowed file types and extensions.
        $allowedExtensions = ['jpeg', 'jpg', 'png', 'gif', 'mp4', 'webm'];
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/webm'];

        if (in_array($fileExtension, $allowedExtensions)) {
            $uniqueFileName = uniqid() . '.' . $fileExtension;
            $targetFilePath = $upload_folder . DIRECTORY_SEPARATOR . $uniqueFileName;

            // Delete existing file if it exists.
            if ($existingFilePath && file_exists($existingFilePath)) {
                if (!unlink($existingFilePath)) {
                    echo "<script>alert('Failed to delete existing file.'); window.location.href = '../../view/caterers/posts.php';</script>";
                    return false;
                }
            }

            // Move the file to the target folder.
            if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
                return $targetFilePath;
            } else {
                echo "<script>alert('Error moving file.'); window.location.href = '../../view/caterers/posts.php';</script>";
                return false;
            }
        } else {
            echo "<script>alert('Invalid file type.'); window.location.href = '../../view/caterers/posts.php';</script>";
            return false;
        }
    } else {
        echo "<script>alert('No file uploaded or an error occurred.'); window.location.href = '../../view/caterers/posts.php';</script>";
        return false;
    }
}

// Process image or video upload.
if (isset($_FILES['post_image']) && $_FILES['post_image']['error'] === UPLOAD_ERR_OK) {
    $image_path = update_image('../../caterer_images/post_images', $_FILES['post_image']);
} elseif (isset($_FILES['post_video']) && $_FILES['post_video']['error'] === UPLOAD_ERR_OK) {
    $video_path = update_image('../../caterer_videos/post_videos', $_FILES['post_video']);
}

// Create the post.
if (create_post_controller($post_text, $image_path ?? null, $video_path ?? null)) {
    echo "<script> alert('Post was successful.'); window.location.href = '../../view/caterers/posts.php';</script>";
}
?>
