<?php
session_start();
if (!$_SESSION['cid']) {
    echo "<script>window.location.href = '../../index.php';</script>";
}
?>
<?php include '../../actions/caterer_actions/retrieve_ads_action.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Ads</title>
    <link rel="stylesheet" href="../../css/caterers/manage_ads.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">
</head>

<body>
    <nav class="side-nav">
        <a href="#" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
        <a href="./business_dashboard.php" class="nav-items"><img class="icon" src="../../icons/home_icon.png" alt="home icon">Home</a>
        <!-- <a href="./messages.php" class="nav-items"><img class="icon" src="../../icons/message_icon.png" alt="message icon">Messages</a>
        <a href="#" class="nav-items"><img class="icon" src="../../icons/review_icon.png" alt="review icon">Reviews</a> -->
        <a href="./posts.php" class="nav-items"><img class="icon" src="../../icons/post_icon.png" alt="post icon">Posts</a>
        <a href="./advertisment.php" class="nav-item-selected"><img class="icon" src="../../icons/ad.png" alt="account icon">Advertisment</a>
        <a href="./my_profile.php" class="nav-items"><img class="icon" src="../../icons/account_icon.png" alt="account icon">My Profile</a>
        <a href="./subscription.php" class="nav-items"><img class="icon" src="../../icons/account_icon.png" alt="account icon">Subscription</a>
        <a href="../../actions/logout.php" class="nav-items"><img class="icon" src="../../icons/logout_icon.png" alt="account icon">Logout</a>
    </nav>

    <nav class="top-nav">
        <a href="./advertisment.php" class="nav-items">New Ad +</a>
        <a href="#" class="nav-item-selected">Manage Ads</a>
    </nav>

    <div class="ad-management-container">
        <h2>Manage Your Ads</h2>
        <div class="ads-grid">
            <?php foreach ($all_ads as $ad): ?>
                <div class="ad-post">
                    <img src="<?php echo htmlspecialchars($ad['image_path']); ?>" alt="Ad Image" class="ad-image">
                    <div class="ad-text">
                        <h3><?php echo htmlspecialchars($ad['title']); ?></h3>
                        <p>Description: <?php echo htmlspecialchars($ad['description']); ?></p>
                        <p>Event types: <?php echo htmlspecialchars($ad['event_types']); ?></p>
                        <p>Promotion Status: <h class="promotion-status"><?php echo htmlspecialchars($ad['promotion_status']); ?></h></p>
                    </div>
                    <div class="action-buttons">
                        <button class="action-btn" onclick="openEditPostModal(<?php echo $ad['ad_id']; ?>, '<?php echo addslashes($ad['title']); ?>', '<?php echo addslashes($ad['description']); ?>', '<?php echo addslashes($ad['image_path']); ?>')">Edit</button>
                        <button class="action-btn" onclick="openDeletePostModal(<?php echo $ad['ad_id']; ?>)">Delete</button>
                        <button class="action-btn" onclick="window.location.href='promote_ad.php?ad_id=<?php echo $ad['ad_id']; ?>'">Promote</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="editPostModal" class="modal">
        <div class="modal-content">
            <h3>Edit Post</h3>
            <form action="../../actions/caterer_actions/edit_ad_action.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="adId" name="ad_id">

                <label for="adTitle">Ad Title</label>
                <input type="text" id="adTitle" name="title" required>

                <label for="adDescription">Ad Description</label>
                <textarea id="adDescription" name="description" rows="4" required></textarea>

                <label for="service_area">Select event type:</label>
                <select id="service_area" name="event_type">
                    <option value="" disabled selected>-- Select Event Type --</option>
                    <option value="wedding">Wedding</option>
                    <option value="party">Party</option>
                    <option value="funeral">Funeral</option>
                    <option value="corporate">Corporate</option>
                    <option value="individual">Individual</option>
                </select>

                <label for="adImage">Ad Image</label>
                <div id="adImagePreview">
                    <img id="adImagePreviewImg" src="" alt="Ad Image" style="max-width: 100%; max-height: 200px;">
                </div>
                <input type="file" id="adImage" name="image" accept="image/*">

                <input type="hidden" id="existingImage" name="existing_image">


                <input type="submit" class="action-btn" name="save_change" value="Save">
                <button type="button" class="action-btn" onclick="closeEditPostModal()">Close</button>
            </form>
        </div>
    </div>

    <div id="deletePostModal" class="modal">
        <div class="modal-content">
            <h3>Are you sure you want to delete this ad?</h3>
            <p>This action cannot be reversed</p>
            <form method="POST" action="../../actions/caterer_actions/delete_ad_action.php">
                <input type="hidden" id="deleteAdId" name="ad_id">
                <input type="submit" class="delete-action-btn" name="delete_confirmed">
                <form>
                    <span class="action-btn" onclick="closeDeletePostModal()" id="deletePostModal">Cancel</span>
        </div>
    </div>
</body>
<script src="../../js/manage_ads.js"></script>

</html>