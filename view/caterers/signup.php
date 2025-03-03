<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Caterer</title>
    <link rel="stylesheet" href="../../css/caterers/signup.css">
    <link rel="icon" href="../../images/rounded_logo.png" type="image/png">
</head>

<body>
    <video autoplay muted loop id="background-video">
        <source src="../../videos/register_video.mp4" type="video/mp4">
    </video>

    <div class="registration-form">
        <a href="../../index.php" class="platform-name">
            <img class="logo" src="../../images/logo.png" alt="CatererHub logo">CatererHub
        </a>

        <p class="">Sign up as a caterer</p>

        <form id="caterer-signup" action="../../actions/caterer_actions/register_action.php" method="post">
            <!-- Business Information Section -->
            <fieldset>
                <legend>Business Information</legend>
                <label for="business_name">Business Name:</label>
                <input type="text" id="business_name" name="business_name" placeholder="Enter Business Name" required>

                <label for="password">Password:</label>
                <input type="text" id="password_name" name="password" placeholder="Enter Password" required>

                <label for="contact_email">Contact Email:</label>
                <input type="email" id="contact_email" name="email" placeholder="enter.email@email.com" required>

                <label for="contact_phone">Contact Phone Number:</label>
                <input type="tel" id="contact_phone" name="business_phone" placeholder="Enter Phone Number" required>
            </fieldset>

            <!-- Catering Services Section -->
            <fieldset>
                <legend>Catering Services</legend>
                <label for="cuisine">Event types:</label>
                <select id="cuisine" name="events" required>
                    <option value="" disabled selected>-- Select Events --</option>
                    <option value="wedding">Wedding</option>
                    <option value="party">Parties</option>
                    <option value="corperate">Corperate</option>
                    <option value="funeral">Funeral</option>
                    <option value="all">All Above</option>
                </select>

                <label>Dietary Restrictions:</label>
                <div>
                    <input type="checkbox" id="dietary_vegan" name="dietary_restrictions[]" value="vegan">
                    <label for="dietary_vegan">Vegan</label>

                    <input type="checkbox" id="dietary_vegetarian" name="dietary_restrictions[]" value="vegetarian">
                    <label for="dietary_vegetarian">Vegetarian</label>

                    <input type="checkbox" id="dietary_gluten_free" name="dietary_restrictions[]" value="gluten_free">
                    <label for="dietary_gluten_free">Gluten-free</label><br>
                </div>

                <label for="service_area">Select Service Area:</label>
                <select id="service_area" name="service_area" required>
                    <option value="" disabled selected>-- Select Service Region --</option>
                    <option value="Accra">Accra</option>
                    <option value="Kumasi">Kumasi</option>
                    <option value="Takoradi">Takoradi</option>
                    <option value="Tamale">Tamale</option>
                    <option value="Cape Coast">Cape Coast</option>
                    <option value="Ho">Ho</option>
                    <option value="Sunyani">Sunyani</option>
                    <option value="Bolgatanga">Bolgatanga</option>
                    <option value="Wa">Wa</option>
                    <option value="Tema">Tema</option>
                    <option value="Koforidua">Koforidua</option>
                </select>
            </fieldset>
            <input type="submit" name="register" value="Sign Up as a Caterer">
            <p>Already have an account, login <a href="./login.php">here</a></p>
        </form>
    </div>
</body>

</html>