<?php
session_start();
include '../../actions/eventplanner_actions/home_actions(all_ads).php';
if ($_SESSION['home_ads']) {
	$ads = $_SESSION['home_ads'] ?? [];
	unset($_SESSION['home_ads']);
} else {
	$ads = $_SESSION['all_home_ads'] ?? [];
	// unset($_SESSION['all_home_ads']);
}

// $ads = $_SESSION['all_home_ads'];
// $ads = $_SESSION['home_ads'] ?? [];

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome</title>
	<link rel="stylesheet" href="../../css/eventplanner/home.css">
	<link rel="icon" href="../../images/rounded_logo.png" type="image/png">

</head>

<body>
	<div class="top-nav-container">
		<nav class="top-nav">
			<a href="./home.php" class="platform-name"><img class="logo" src="../../images/logo.png" alt="caterer hub logo">CatererHub</a>
			<a href="./home.php" class="nav-item-selected">Explore</a>
			<a href="./socials.php" class="nav-items">Socials</a>
			<a href="./requests.php" class="nav-items">Request</a>
			<a href="./featured.php" class="nav-items">Featured</a>
			<a href="./account.php" class="account-nav-item">Account <img class="dropdown-icon" src="../../images/navigation/arrow-down.png"></a>
		</nav>
	</div>

	<nav class="top-nav-search">
		<form class="search-caterer" action="../../actions/eventplanner_actions/home_actions.php" method="POST">
			<div class="search-container">
				<input type="text" name="business_name" placeholder="Search caterer" required />
				<input type="submit" name="search_by_name" class="search-button" value="🔍">
			</div>
		</form>
	</nav>

	<div class="right-container">

		<div class="subscription-container">
			<h2 class="subscription-title">Messages</h2>
		</div>
	</div>

	<div class="left-container">
		<form action="../../actions/eventplanner_actions/home_actions(filters).php" method="POST">
			<div class="category-card">
				<h2>Service Filters</h2>
				<form action="../../actions/eventplanner_actions/home_actions.php" method="POST">
					<label class="subscription-description">
						<input type="radio" name="subscription" value="wedding" required> Weddings
					</label>
					<label class="subscription-description">
						<input type="radio" name="subscription" value="party"> Party
					</label>
					<label class="subscription-description">
						<input type="radio" name="subscription" value="corporate"> Corporate
					</label>
					<label class="subscription-description">
						<input type="radio" name="subscription" value="individual"> Individual Service
					</label>
					<label class="subscription-description">
						<input type="radio" name="subscription" value="funeral"> Funerals
					</label>
					<label class="subscription-description">
						<input type="radio" name="subscription" value="all"> All services
					</label>

					<input type="submit" class="subscription-button" value="Search" name="event_filter">
				</form>
			</div>
		</form>
		<a href="./featured.php">
		<div class="subscription-container">
			<h2 class="subscription-title">Featured</h2>
			<p class="subscription-description">Explore featured caterers here.</p>
		</div>
		</a>
	</div>

	<div class="search-content">
		<?php

		?>
		<?php foreach ($ads as $ad): ?>
			<a href="product_details.php?ad_id=<?php echo urlencode($ad['ad_id']); ?>" class="product-card">
				<div class="post-media">
					<img src="<?php echo htmlspecialchars($ad['image_path']); ?>" alt="Dish Image" />
				</div>
				<p class="caterer-name"><?php echo htmlspecialchars($ad['business_name']); ?></p>
				<div class="caterer-rating">
					<span>
						<?php
						// Example for displaying stars (uncomment if needed)
						// echo str_repeat('⭐️', intval(4));
						?>
					</span>
				</div>
				<p class="event-types"><?php echo htmlspecialchars($ad['event_types']); ?></p>
			</a>

		<?php endforeach; ?>
	</div>
</body>

</html>