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
    <title>Caterer Home</title>
    <link rel="stylesheet" href="../../css/caterers/subscription.css">
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
            <h3>Get Premium Caterer Hub to be featured on CatererHub</h3>
            <img class="premium-image" src="../../icons/premium_icon.png">
            

            <!-- Payment Form -->
            <form id="paymentForm">
                <input type="hidden" id="email-address" value="<?= $_SESSION['c_email'] ?>">
                <input type="hidden" id="ad_id" value="<?php echo $_SESSION['cid']; ?>">
                <input type="hidden" id="amount" value="150"> 
                <button type="submit" class="subscription-button">Purchase Service</button>
            </form>
        </div>
    </div>

    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="../../js/pay_premium.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script></body>

</body>

</html>