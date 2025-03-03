<?php
session_start();
if (!$_SESSION['cid']) {
    echo "<script>window.location.href = '../../index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Ad</title>
    <link rel="stylesheet" href="../../css/caterers/advertisment.css">
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

        <!-- <button href="#" class="nav-button">Post</button> -->
    </nav>

    <nav class="top-nav">
        <a href="#" class="nav-item-selected">New Ad +</a>
        <a href="./manage_ads.php" class="nav-items">Manage Ads</a>
    </nav>


    <!--right-->
    <div class="right-container">

        <div class="subscription-container">
            <h2 class="subscription-title">Subscribe to Premium</h2>
            <p class="subscription-description">Enjoy exclusive features and boost your revenue.</p>
            <a href="./subscription.php"><button class="subscription-button">Subscribe</button></a>
        </div>
    </div>


    <!--caterer form-->
    <div class="form-container">
        <form class="caterer-ad-form" action="../../actions/caterer_actions/post_ad_action.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ad-title">Title:</label>
                <input type="text" id="ad-title" name="title" placeholder="Enter ad title" required />
            </div>

            <div class="form-group">
                <label>Description:</label>
                <textarea id="ad-description" name="description" placeholder="Entre add description" rows="5" required></textarea>
            </div>

            <label for="service_area">Event type:</label>
            <select id="service_area" name="event_type" require>
                <option value="" disabled selected>-- Select Event Type --</option>
                <option value="wedding">Wedding</option>
                <option value="party">Party</option>
                <option value="funeral">Funeral</option>
                <option value="corporate">Corporate</option>
                <option value="individual">Individual</option>
            </select>

            <div class="form-group">
                <label for="ad-image">Upload ad Image:</label>
                <p class="file-recommendation">preferably a 1:1 image</p>
                <input type="file" id="ad-image" name="image" accept=".jpg, .jpeg, .png, .gif" required />
            </div>

            <input type="submit" class="submit-btn" name="post_ad" value="Post Ad">
        </form>

    </div>

















</body>

</html>