<?php
session_start();
if (!$_SESSION['eid']){
    echo "<script>window.location.href = '../../index.php';</script>";
}
?>
<?php include '../../actions/eventplanner_actions/retrieve_account_action.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../../css/eventplanner/account.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">

</head>

<body>
    <div class="top-nav-container">
        <nav class="top-nav">
            <a href="./home.php" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
            <a href="./home.php" class="nav-items">Explore</a>
            <a href="./socials.php" class="nav-items">Socials</a>
            <a href="./requests.php" class="nav-items">Request</a>
            <a href="./featured.php" class="nav-items">Featured</a>
            <a href="./account.php" class="nav-item-selected">Account <img class="dropdown-icon" src="../../images/navigation/arrow-down.png"></a>
        </nav>
    </div>


    <div class="profile-container">
        <div class="profile-banner">
            <img src="../../images/default_banner.jpg" alt="profile banner">
        </div>

        <div class="profile-picture">
            <img src="<?php echo htmlspecialchars($account['image_path']); ?>">
        </div>

        <div class="edit-profile" id="edit-profile">
            Edit profile
        </div>




        <div class="popup-overlay" id="popup-overlay"></div>

        <div class="form-container popup" id="popup-form">
            <form class="caterer-ad-form" action="../../actions/eventplanner_actions/edit_account_action.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="ad-title">Username:</label>
                    <input type="text" id="ad-title" name="username" placeholder="Enter username" />
                </div>

                <div class="form-group">
                    <label for="ad-image">Upload Profile Picture:</label>
                    <input type="file" id="ad-image" name="profile_picture" accept=".jpg, .jpeg, .png, .gif" />
                </div>

                <div class="form-group">
                    <label for="ad-image">Phone Number:</label>
                    <input type="number" id="ad-image" name="phone_number"/>
                </div>

                <div class="location-container">
                    <label for="service_area">Select Location:</label>
                    <select id="service_area" name="location">
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

                <input type="submit" class="submit-btn" name="edit_account" value="Done">

            </form>
            <button class="popup-close" id="popup-close">Close</button>
        </div>










        <div class="left-profile-container">
            <h1> Username: <?php echo htmlspecialchars($account['username']); ?></h1>

            <p class="description-text">Phone: <h class="php-value"><?php echo htmlspecialchars($account['phone_number']); ?></h>
            </p>
            <p class="description-text">Email: <h class="php-value"><?php echo htmlspecialchars($account['email']); ?></h>
            </p>
            <p class="description-text">Location: <h class="php-value"><?php echo htmlspecialchars($account['location']); ?></h>
            </p>
        </div>


        <div class="social-profile-container">
            <a href="./requests.php">
                <div class="social-item">
                    <img src="../../icons/ad.png" alt="ads icon" class="social-icon">
                    <div class="ads" onclick="window.location.href='./manage_ads.php'">
                        <p class="social-value"><?= htmlspecialchars($request_count) ?></p>
                        <p class="social-label">active requests</p>
                    </div>
                </div>
            </a>
        </div>


    </div>






    <script src="../../js/my_profile.js"></script>



</body>

</html>