<?php
session_start();
if (!$_SESSION['cid']) {
    echo "<script>window.location.href = '../../index.php';</script>";
}

?>
<?php include'../../actions/caterer_actions/home_action.php'; ?>
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
        
        <a href="../../actions/logout.php" class="nav-items"><img class="icon" src="../../icons/logout_icon.png" alt="account icon">Logout</a>
    </nav>

    <div class="body-content">
        <h class="page-title">Home</h><br><br>
    </div>

    <!-- <div class="squarish-card-container">
        <div class="squarish-card"> 
            <img class="squarish-card-icon" src="../../icons/request_icon.png">
            <p>Total requests</p>
            <p>0</p>
        </div>

        <div class="squarish-card"> 
            <img class="squarish-card-icon" src="../../icons/upcoming_icon.png">
            <p>Accepted deals</p>
            <p>0</p>
        </div>

        <div class="squarish-card">
            <img class="squarish-card-icon" src="../../icons/failed_icon.png">
            <p>Completed deals</p>
            <p>0</p>
        </div>
    </div> -->

    <div class="body-content">
        <h class="page-title">Requests Made</h>
        <p class="description-text">Ad service requested from event planners</p>
        
    </div>


    <!--rectangular-cards-->
    <div class="rectangular-card-container">
    <?php
    // Assuming $data is the result returned from the controller
    foreach ($total_requests as $entry) {
    ?>

        <div class="rectangular-card">
            <p class="date"><?php echo $entry['username']; ?> at:</p> <!-- Event Planner's username -->
            <p class="time"><?php echo $entry['created_at']; ?></p> <!-- Date/Time the interaction was created -->
            <p class="name"><?php echo $entry['status']; ?></p> <!-- Status of the interaction -->
            <p class="name"><?php echo $entry['phone_number']; ?></p> <!-- Status of the interaction -->
            
        </div>
    <?php
    }
    ?>
</div>

</body>

</html>