<?php
session_start();
include '../../actions/eventplanner_actions/home_actions(all_ads).php';
if ($_SESSION['home_ads']) {
    $ads = $_SESSION['home_ads'] ?? [];
    unset($_SESSION['home_ads']);
} else {
    $ads = $_SESSION['all_home_ads'] ?? [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../../css/eventplanner/product_details.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">

</head>

<body>
    <div class="top-nav-container">
        <nav class="top-nav">
            <a href="./home.php" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
            <a href="./home.php" class="nav-item-selected">Explore</a>
            <a href="./socials.php" class="nav-items">Socials</a>
            <a href="./requests.php" class="nav-items">Requests</a>
            <a href="#" class="nav-items">Popular</a>
            <a href="#" class="account-nav-item">Account <img class="dropdown-icon" src="../../images/navigation/arrow-down.png"></a>
        </nav>
    </div>





    <div class="left-container">
        <div class="subscription-container">
            <h2 class="subscription-title">Featured</h2>
            <p class="subscription-description">Explore featured caterers here.</p>
        </div>
    </div>


    <div class="search-content">

        <?php
        if (isset($_GET['ad_id'])) {
            $selected_ad_id = htmlspecialchars($_GET['ad_id']);

            // Filter the specific ad
            foreach ($ads as $ad) {
                if ($ad['ad_id'] === $selected_ad_id) {
        ?>
                    <a class="product-card">
                        <div class="post-media">
                            <img src="<?php echo htmlspecialchars($ad['image_path']); ?>" alt="Dish Image" />
                        </div>
                        <p class="caterer-name">Business Name: <h class="php-text"><?php echo htmlspecialchars($ad['business_name']); ?></h>
                        </p>
                        <div class="caterer-rating">
                            <span>
                                <?php
                                // echo str_repeat('⭐️', intval(4));
                                ?>
                            </span>
                        </div>
                        <p class="event-types">Event Type: <h class="php-text"><?php echo htmlspecialchars($ad['event_types']); ?></h>
                        </p>
                        <p class="event-description">Description: <h class="php-text"><?php echo htmlspecialchars($ad['description']); ?></h>
                        </p>
                        <p class="event-types">Contact: <h class="php-text"><?php echo htmlspecialchars($ad['contact_phone']); ?></h>
                        </p>

                        <form action="../../actions/eventplanner_actions/save_ad_action.php" method="post">
                            <input type="hidden" name="ad_id" value="<?= $selected_ad_id ?>">
                            <input type="hidden" name="caterer_id" value="<?= htmlspecialchars($ad['caterer_id']);?>">
                            <button type="submit" class="subscription-button">Request Service</button>
                        </form>

                    </a>
        <?php
                    break;
                }
            }
        }
        ?>

    </div>









</body>

</html>