<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="css/tiny-slider.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<title>KeepReal Store</title>
	<style>
		#product-image {
			max-width: 100%;
			/* Ensures the image doesn’t overflow */
			max-height: 300px;
			/* Limits the height to 300px */
			width: auto;
			height: auto;
			object-fit: contain;
			/* Ensures the image fits within specified dimensions */
		}
	</style>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

		<div class="container">
			<a class="navbar-brand" href="index.php">KeepReal<span>.</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="<?php echo ($activepage == 'home') ? 'active' : 'nav-item' ?>">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="<?php echo ($activepage == 'shop') ? 'active' : 'nav-item' ?>"><a class="nav-link" href="shop.php">Shop</a></li>
				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<li><a class="nav-link" href="cart.php"><img src="images/cart.svg"></a></li>
					<li><a class="nav-link" href="profile.php"><img src="images/user.svg"></a></li>
				</ul>
			</div>
		</div>

	</nav>