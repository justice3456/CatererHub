<?php
session_start();
if (!$_SESSION['eid']){
    echo "<script>window.location.href = '../../index.php';</script>";
}
?>
<?php include '../../actions/caterer_actions/retrieve_all_posts_action.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../../css/eventplanner/socials.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">

</head>

<body>
    <div class="top-nav-container">
        <nav class="top-nav">
            <a href="./home.php" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
            <a href="./home.php" class="nav-items">Explore</a>
            <a href="./socials.php" class="nav-item-selected">Socials</a>
            <a href="./requests.php" class="nav-items">Request</a>
            <a href="#" class="nav-items">Popular</a>
            <a href="./account.php" class="nav-item">Account <img class="dropdown-icon" src="../../images/navigation/arrow-down.png"></a>
        </nav>
    </div>

    <div class="posts-container">    
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