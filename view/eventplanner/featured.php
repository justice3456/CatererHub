<?php include '../../actions/eventplanner_actions/retrieve_featured_action.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../../css/eventplanner/featured.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">

    
</head>

<body>
    <div class="top-nav-container">
        <nav class="top-nav">
            <a href="./home.php" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
            <a href="./home.php" class="nav-items">Explore</a>
            <a href="./socials.php" class="nav-items">Socials</a>
            <a href="./requests.php" class="nav-items">Request</a>
            <a href="./featured.php" class="nav-item-selected">Featured</a>
            <a href="./account.php" class="account-nav-item">Account <img class="dropdown-icon" src="../../images/navigation/arrow-down.png"></a>
        </nav>
    </div>







    <div class="search-content">
        <?php
        if ($all_requests){

        ?>
        <?php foreach ($all_requests as $ad): ?>
            <a class="product-card">
                <!-- <div class="post-media">
                    <img src="<?php echo htmlspecialchars($ad['image_path']); ?>" alt="Dish Image" />
                </div> -->
                <p class="caterer-name">Business Name: <?php echo htmlspecialchars($ad['business_name']); ?></p>
                <p class="event-types">Phone Contact: <?php echo htmlspecialchars($ad['contact_phone']); ?></p>
                <p class="event-types">Phone Contact: <?php echo htmlspecialchars($ad['service_areas']); ?></p>

                
            </a>

        <?php endforeach; ?>
        <?php
        } else {
            echo "No featured caterer";
        }

        ?>
    </div>









</body>

</html>