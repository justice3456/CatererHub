<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/caterers/login.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">

</head>

<body>
    <div class="left-image">
        <video class="login-image" autoplay loop muted>
            <source src="../../videos/login_video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="top-text">

    </div>



    <form class="login-form" method="post" action="../../actions/caterer_actions/login_action.php
    ">

        <a href="../index.php" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
        <p class="login-prompt">Log in to your caterer account here!</p>

        <input type="email" id="email" name="email" placeholder="enter.email@email.com" required>

        <input type="password" id="password" name="password" placeholder="password" required>

        <input type="submit" name="login" value="Log In"></button>
        <p class="signin-prompt-container">Don't have a caterer's account? Create one <a href="./signup.php" class="signin-prompt">here</a></p>
        

        
    </form>
    
</body>

</html>