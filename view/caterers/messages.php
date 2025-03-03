<?php
session_start();
if (!$_SESSION['cid']){
    echo "<script>window.location.href = '../../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caterer Home</title>
    <link rel="stylesheet" href="../../css/caterers/business_messages.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">

</head>

<body>
    <nav class="side-nav">
        <a href="#" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
        <a href="./business_dashboard.php" class="nav-items"><img class="icon" src="../../icons/home_icon.png" alt="home icon">Home</a>
        <a href="./messages.php" class="nav-item-selected"><img class="icon" src="../../icons/message_icon.png" alt="message icon">Messages</a>
        <a href="#" class="nav-items"><img class="icon" src="../../icons/review_icon.png" alt="review icon">Reviews</a>
        <a href="./posts.php" class="nav-items"><img class="icon" src="../../icons/post_icon.png" alt="post icon">Posts</a>
        <a href="./advertisment.php" class="nav-items"><img class="icon" src="../../icons/ad.png" alt="account icon">Advertisment</a>
        <a href="./my_profile.php" class="nav-items"><img class="icon" src="../../icons/account_icon.png" alt="account icon">My Profile</a>
        <a href="./subscription.php" class="nav-items"><img class="icon" src="../../icons/account_icon.png" alt="account icon">Subscription</a>
        <a href="../../actions/logout.php" class="nav-items"><img class="icon" src="../../icons/logout_icon.png" alt="account icon">Logout</a>
    </nav>

    <div class="body-content">
        <h class="page-title">Messages</h>
    </div>

    <p class="business-profile"><img class="business-profile-picture" src="../../images/messages/business_profile_picture.png" >Business Name</p>




    <!--rectangular-cards-->
    <div class="rectangular-card-container">

        <div class="rectangular-card">
            <!-- <img class="squarish-card-icon" src="../../icons/request_icon.png"> -->
            <img class="business-profile-picture" src="../../images/messages/business_profile_picture.png" >
            <p class="date">21 Nov at: </p> <!--date-->
            <p class="time">12:00</p> <!--time-->
            <p class="name">Name</p> <!--name-->
            <p class="message-count">1</p> <!--message count-->
        </div>

        <div class="rectangular-card">
            <!-- <img class="squarish-card-icon" src="../../icons/request_icon.png"> -->
            <img class="business-profile-picture" src="../../images/messages/business_profile_picture.png" >
            <p class="date">21 Nov at: </p> <!--date-->
            <p class="time">12:00</p> <!--time-->
            <p class="name">Name</p> <!--name-->
            <p class="message-count">1</p> <!--message count-->
        </div>



        
    </div>

    <div class="message-container">
        <p>Sent Text</p>
        <p>Recieved Text</p>
    </div>

    










</body>

</html>