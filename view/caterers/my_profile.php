<?php
session_start();
if (!$_SESSION['cid']){
    echo "<script>window.location.href = '../../index.php';</script>";
}
?>
<?php include '../../actions/caterer_actions/retrieve_profile_action.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Ad</title>
    <link rel="stylesheet" href="../../css/caterers/my_profile.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">

</head>

<body>
    <nav class="side-nav">
        <a href="#" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
        <a href="./business_dashboard.php" class="nav-items"><img class="icon" src="../../icons/home_icon.png" alt="home icon">Home</a>
        <!-- <a href="./messages.php" class="nav-items"><img class="icon" src="../../icons/message_icon.png" alt="message icon">Messages</a>
        <a href="#" class="nav-items"><img class="icon" src="../../icons/review_icon.png" alt="review icon">Reviews</a> -->
        <a href="./posts.php" class="nav-items"><img class="icon" src="../../icons/post_icon.png" alt="post icon">Posts</a>
        <a href="./advertisment.php" class="nav-items"><img class="icon" src="../../icons/ad.png" alt="account icon">Advertisment</a>
        <a href="#" class="nav-item-selected"><img class="icon" src="../../icons/account_icon.png" alt="account icon">My Profile</a>
        <a href="./subscription.php" class="nav-items"><img class="icon" src="../../icons/account_icon.png" alt="account icon">Subscription</a>

        <a href="../../actions/logout.php" class="nav-items"><img class="icon" src="../../icons/logout_icon.png" alt="account icon">Logout</a>
    </nav>

    <div class="right-container">
        <div class="subscription-container">
            <h2 class="subscription-title">Subscribe to Premium</h2>
            <p class="subscription-description">Enjoy exclusive features and boost your revenue.</p>
            <a href="./subscription.php"><button class="subscription-button">Subscribe</button></a>
        </div>

  

        <div class="subscription-container">
            <p class="subscription-description">Exclusive events show up here</p>
        </div>
    </div>

    <nav class="top-nav">
        <a href="#" class="nav-items">My Profile</a>
    </nav>


    <div class="profile-container">
        <div class="profile-banner">
            <img src="<?php echo htmlspecialchars($profile_images['banner_picture_path']); ?>" alt="profile banner">
        </div>

        <div class="profile-picture">
            <img src="<?php echo htmlspecialchars($profile_images['profile_picture_path']); ?>" alt="profile banner">
        </div>

        <div class="edit-profile" id="edit-profile">
            Edit profile
        </div>




        <div class="popup-overlay" id="popup-overlay"></div>

        <div class="form-container popup" id="popup-form">
            <form class="caterer-ad-form" action="../../actions/caterer_actions/edit_profile_action.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="ad-title">Business name:</label>
                    <input type="text" id="ad-title" name="business_name" placeholder="Enter ad title" />
                </div>

                <div class="form-group">
                    <label for="ad-image">Upload Profile Picture:</label>
                    <input type="file" id="ad-image" name="profile_picture" accept=".jpg, .jpeg, .png, .gif"/>

                    <label for="ad-image">Upload Banner Image:</label>
                    <input type="file" id="ad-image" name="banner_picture" accept=".jpg, .jpeg, .png" />
                </div>

                <!-- Dietary Restrictions -->
                <fieldset class="dietary-restricions">
                    <legend>Dietary Restrictions:</legend>
                    <div>
                        <input type="checkbox" id="vegan" name="dietary_restrictions[]" value="vegan">
                        <h for="vegan" class="checkbox-name">Vegan</h>
                    </div>
                    <div>
                        <input type="checkbox" id="vegetarian" name="dietary_restrictions[]" value="vegetarian">
                        <hfor="vegetarian" class="checkbox-name">Vegetarian</h>
                    </div>
                    <div>
                        <input type="checkbox" id="gluten_free" name="dietary_restrictions[]" value="gluten_free">
                        <h for="gluten_free" class="checkbox-name">Gluten-free</h>
                    </div>
                </fieldset>

                <!-- Event Types -->
                <fieldset class="event-types">
                    <legend>Event Types:</legend>
                    <div>
                        <input type="checkbox" id="wedding" name="event_types[]" value="wedding">
                        <h for="wedding" class="checkbox-name">Wedding</h>
                    </div>
                    <div>
                        <input type="checkbox" id="party" name="event_types[]" value="party">
                        <h for="party" class="checkbox-name">Party</h>
                    </div>
                    <div>
                        <input type="checkbox" id="funeral" name="event_types[]" value="funeral">
                        <h for="funeral" class="checkbox-name">Funeral</h>
                    </div>
                    <div>
                        <input type="checkbox" id="corporate" name="event_types[]" value="corporate">
                        <h for="corporate" class="checkbox-name">Corporate</h>
                    </div>
                    <div>
                        <input type="checkbox" id="individual" name="event_types[]" value="individual">
                        <h for="individual" class="checkbox-name">Individual</h>
                    </div>
                </fieldset>

                <div class="location-container">
                    <label for="service_area">Select Location:</label>
                    <select id="service_area" name="service_area" >
                        <option value="" disabled selected>-- Select Your Region --</option>
                        <option value="Accra">Accra</option>
                        <option value="Kumasi">Kumasi</option>
                        <option value="Takoradi">Takoradi</option>
                        <option value="Tamale">Tamale</option>
                        <option value="Cape Coast">Cape Coast</option>
                        <option value="Ho">Ho</option>
                        <option value="Sunyani">Sunyani</option>
                        <option value="Bolgatanga">Bolgatanga</option>
                        <option value="Wa">Wa</option>
                        <option value="Tema">Tema</option>
                        <option value="Koforidua">Koforidua</option>
                    </select>
                </div>

                <input type="submit" class="submit-btn" name="edit_profile" value="Done">

            </form>
            <button class="popup-close" id="popup-close">Close</button>
        </div>










        <div class="left-profile-container">
            <h1><?php echo htmlspecialchars($profile['business_name']); ?></h1>
            <p class="description-text">Event types:<h class="php-value"> <?php echo htmlspecialchars($profile['event_types']); ?></h></p>
            <p class="description-text">Dietary restrictions: <h class="php-value"><?php echo htmlspecialchars($profile['dietary_restrictions']); ?></h></p>
            <p class="description-text">Service areas: <h class="php-value"><?php echo htmlspecialchars($profile['service_areas']); ?></h></p>
        </div>


        <div class="social-profile-container">
            <div class="social-item">
                <img src="../../icons/followers.png" alt="subscribers icon" class="social-icon">
                <div class="followers" onclick="window.location.href='./followers.php'">
                    <p class="social-value">N/A</p>
                    <p class="social-label">followers</p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="social-item">
                <img src="../../icons/write.png" alt="posts icon" class="social-icon">
                <div onclick="window.location.href='./posts.php'" class="posts">
                    <p class="social-value"><?= htmlspecialchars($post_count) ?></p>
                    <p class="social-label">posts</p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="social-item">
                <img src="../../icons/ad.png" alt="ads icon" class="social-icon">
                <div class="ads" onclick="window.location.href='./manage_ads.php'">
                    <p class="social-value"><?= htmlspecialchars($ad_count) ?></p>
                    <p class="social-label">ads</p>
                </div>
            </div>
        </div>

        <div class="rectangular-card-container">
            <p class="my-post">My Posts</p>
            <div class="my-posts">
            <div class="existing-posts">
            <?php foreach ($all_specific_posts as $post): ?>
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

        </div>



    </div>







    <script src="../../js/my_profile.js"></script>

</body>

</html>