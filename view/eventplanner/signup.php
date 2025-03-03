<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../../css/eventplanner/signup.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">

</head>

<body>
    <div class="left-image">
        <img class="signin-image" src="../../images/register_signin/signup_image.png">
    </div>

    <div class="top-text">

    </div>



    <form class="registration-form" method="post" action="../../actions/eventplanner_actions/register_action.php">
        <a href="../../index.php" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
        <p class="signup-prompt">Create an event planner account here!</p>



        <input type="text" id="name" name="name" placeholder="username" required>

        <input type="email" id="email" name="email" placeholder="enter.email@email.com" required>

        <input type="number" id="number" name="phone" placeholder="phone number" required>

        <input type="password" id="password" name="password" placeholder="password" required>

        <input type="submit" name="register" value="Create Account"></button>
        <p class="login-prompt-container">Already have an account? Login <a href="./login.php" class="login-prompt">here</a></p>



    </form>

</body>

</html>