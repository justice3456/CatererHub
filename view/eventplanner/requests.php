<?php include '../../actions/eventplanner_actions/retrieve_requests_action.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../../css/eventplanner/requests.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">

</head>

<body>
    <div class="top-nav-container">
        <nav class="top-nav">
            <a href="./home.php" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
            <a href="./home.php" class="nav-items">Explore</a>
            <a href="./socials.php" class="nav-items">Socials</a>
            <a href="./requests.php" class="nav-item-selected">Request</a>
            <a href="./featured.php" class="nav-items">Featured</a>
            <a href="./account.php" class="account-nav-item">Account <img class="dropdown-icon" src="../../images/navigation/arrow-down.png"></a>
        </nav>
    </div>







    <div class="search-content">
        <?php
        if ($all_requests){

        ?>
        <?php foreach ($all_requests as $ad): ?>
            <a class="product-card">
                <div class="post-media">
                    <img src="<?php echo htmlspecialchars($ad['image_path']); ?>" alt="Dish Image" />
                </div>
                <p class="caterer-name">Business Name: <?php echo htmlspecialchars($ad['business_name']); ?></p>
                <p class="event-types">Add Title: <?php echo htmlspecialchars($ad['ad_title']); ?></p>
                <div class="caterer-rating">
                </div>
                <p class="event-types">Request Status: <?php echo htmlspecialchars($ad['status']); ?></p>
                <p class="event-types">Phone Contact: <?php echo htmlspecialchars($ad['contact_phone']); ?></p>

                <form action="../../actions/eventplanner_actions/delete_request_action.php" method="POST" >
                    <input type="hidden" name="request_id" value="<?= htmlspecialchars($ad['interaction_id']); ?>">
                    <input type="submit" value="Delete Request" class="subscription-button" name="delete_request">
                </form>
            </a>

        <?php endforeach; ?>
        <?php
        } else {
            echo "No requests made yet";
        }

        ?>
    </div>









</body>

</html>