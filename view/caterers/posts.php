<?php
session_start();
if (!$_SESSION['cid']){
    echo "<script>window.location.href = '../../index.php';</script>";
}
?>
<?php include '../../actions/caterer_actions/retrieve_all_posts_action.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="../../css/caterers/posts.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">

</head>

<body>
    <nav class="side-nav">
        <a href="#" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
        <a href="./business_dashboard.php" class="nav-items"><img class="icon" src="../../icons/home_icon.png" alt="home icon">Home</a>
        <!-- <a href="./messages.php" class="nav-items"><img class="icon" src="../../icons/message_icon.png" alt="message icon">Messages</a>
        <a href="#" class="nav-items"><img class="icon" src="../../icons/review_icon.png" alt="review icon">Reviews</a> -->
        <a href="#" class="nav-item-selected"><img class="icon" src="../../icons/post_icon.png" alt="post icon">Posts</a>
        <a href="./advertisment.php" class="nav-items"><img class="icon" src="../../icons/ad.png" alt="account icon">Advertisment</a>
        <a href="./my_profile.php" class="nav-items"><img class="icon" src="../../icons/account_icon.png" alt="account icon">My Profile</a>
        <a href="./subscription.php" class="nav-items"><img class="icon" src="../../icons/account_icon.png" alt="account icon">Subscription</a>
        <a href="../../actions/logout.php" class="nav-items"><img class="icon" src="../../icons/logout_icon.png" alt="account icon">Logout</a>

        <!-- <button href="#" class="nav-button">Post</button> -->
    </nav>

    <nav class="top-nav">
        <a href="#" class="nav-item-selected">Explore</a>
        <a href="./followers.php" class="nav-items">Followers</a>
    </nav>

    <nav class="top-nav-two">
        <form class="search-caterer">
            <div class="search-container">
                <input type="text" name="search_text" placeholder="Search other caterers" required />
                <button type="submit">
                    <img src="../../icons/search_icon.png" alt="Search" />
                </button>
            </div>
        </form>
    </nav>

    <!--right-->
    <div class="right-container">

        <div class="subscription-container">
            <h2 class="subscription-title">Subscribe to Premium</h2>
            <p class="subscription-description">Enjoy exclusive features and boost your revenue.</p>
            <a href="./subscription.php"><button class="subscription-button">Subscribe</button></a>
        </div>

        <!-- <div class="subscription-container">
            <h2 class="subscription-title">Top Caterers</h2>
            <p class="subscription-description">Justice's Chef Service</p>
            <p class="subscription-description">Local Dishes Service</p>
            <p class="subscription-description">Deti's Service</p>
            <p class="subscription-description">Grandma's Sepcials</p>
            <p class="subscription-description">Jollof and Waakye Corners</p>
        </div> -->

        <div class="subscription-container">
            <p class="subscription-description">Enjoy exclusive features and boost your revenue.</p>
        </div>



    </div>



    <!--posts-->
    <div class="posts-container">

        <div class="quick-post">
            <form class="post-form" action="../../actions/caterer_actions/create_post_action.php" method="POST" enctype="multipart/form-data">
                <!-- Text input for post content -->
                <textarea name="post_text" placeholder="What do you want to share?" required></textarea>

                <div class="file-upload">
                    <div class="file-upload">
                        <!-- Image Upload -->
                        <input type="file" name="post_image" accept="image/jpeg, image/png, image/jpg, image/gif" id="imageInput">
                        <label for="imageInput">
                            <img src="../../icons/camera.png" alt="Upload Image" />
                        </label>

                        <!-- Video Upload -->
                        <input type="file" name="post_video" accept="video/mp4, video/webm" id="videoInput">
                        <label for="videoInput">
                            <img src="../../icons/clapperboard.png" alt="Upload Video" />
                        </label>
                    </div>

                </div>

                <button type="submit">Post</button>
            </form>
        </div>
    
        <div class="existing-posts">
            <?php foreach ($all_posts as $post): ?>
                <div class="post">
                    <h class="business-name"><img src="<?= htmlspecialchars($post["profile_picture_path"]) ?>"><?= htmlspecialchars($post["business_name"]) ?></h>
                    <p class="post-text"><?= htmlspecialchars($post["content"]) ?></p>
                    <div class="post-media">
                        <?php if ($post["image_path"]): ?>
                            <img src="<?= htmlspecialchars($post["image_path"]) ?>" alt="Post media" />
                        <?php elseif ($post["video_path"]): ?>
                            <video class="responsive-video" controls>
                                <source src="<?= htmlspecialchars($post["video_path"]) ?>" >
                                Your browser does not support the video tag.
                            </video>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>



    </div>












</body>

</html>