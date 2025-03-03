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
    <title>Caterer Home</title>
    <link rel="stylesheet" href="../../css/caterers/business_dashboard.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">

</head>

<body>
    <nav class="side-nav">
        <a href="#" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
        <a href="#" class="nav-item-selected"><img class="icon" src="../../icons/home_icon.png" alt="home icon">Home</a>
        <!-- <a href="./messages.php" class="nav-items"><img class="icon" src="../../icons/message_icon.png" alt="message icon">Messages</a>
        <a href="#" class="nav-items"><img class="icon" src="../../icons/review_icon.png" alt="review icon">Reviews</a> -->
        <a href="./posts.php" class="nav-items"><img class="icon" src="../../icons/post_icon.png" alt="post icon">Posts</a>
        <a href="./advertisment.php" class="nav-items"><img class="icon" src="../../icons/ad.png" alt="account icon">Advertisment</a>
        <a href="./my_profile.php" class="nav-items"><img class="icon" src="../../icons/account_icon.png" alt="account icon">My Profile</a>
        <a href="./subscription.php" class="nav-items"><img class="icon" src="../../icons/account_icon.png" alt="account icon">Subscription</a>
        <a href="../../actions/logout.php" class="nav-items"><img class="icon" src="../../icons/logout_icon.png" alt="account icon">Logout</a>
    </nav>

    <div class="body-content">
        <h class="page-title">Promote Your Ad</h>
    </div>

    <div class="container">
        <div class="plan-card platinum">
            <h3>Ad Promotion</h3>
            <ul>
                <li>Enhance your ad visibility</li>
            </ul>

            <!-- Payment Form -->
            <form id="paymentForm">
                <input type="hidden" id="email-address" value="<?= $_SESSION['c_email'] ?>">
                <input type="hidden" id="ad_id" value="<?php echo $_GET['ad_id']; ?>">
                <input type="hidden" id="amount" value="20"> <!-- Set your amount here -->
                <button type="submit" class="subscription-button">Purchase Service</button>
            </form>

            <div class="ads-grid">
                <?php foreach ($all_ads as $ad): ?>
                    <?php if ($ad['ad_id'] === $_GET['ad_id']) { ?>
                        <div class="ad-post">
                            <img src="<?php echo htmlspecialchars($ad['image_path']); ?>" alt="Ad Image" class="ad-image">
                            <div class="ad-text">
                                <h3><?php echo htmlspecialchars($ad['title']); ?></h3>
                                <p>Description: <?php echo htmlspecialchars($ad['description']); ?></p>
                                <p>Event types: <?php echo htmlspecialchars($ad['event_types']); ?></p>
                                <p>Promotion Status: <?php echo htmlspecialchars($ad['promotion_status']); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="../../js/pay_promote_ad.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script></body>

</body>

</html>