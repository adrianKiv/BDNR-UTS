<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8">
		<title>Dashboard KeepReal</title>
	
		<!-- Site favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
		<!-- <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png"> -->
        <link rel="shortcut icon" href="favicon.png">

	
		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
		<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
		<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
	
			gtag('config', 'UA-119386393-1');
		</script>
		<style> .custom-btn { padding: 0.15rem 0.5rem; /* Adjust padding */ font-size: 0.6rem; /* Adjust font size */ } </style>
		<style> .modal-content { padding: 20px; } .product-image { width: 100px; /* Atur lebar gambar */ height: auto; /* Pastikan rasio tetap */ } </style>
	</head>
<body>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					  <span class="user-icon">
						<img src="vendors/images/photo1.jpg" alt="">
					  </span>
					  <span class="user-name" id="userName">Loading...</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
					  <a class="dropdown-item" id="profileLink" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
					  <a class="dropdown-item" id="logoutButton" href="#"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				  </div>
				  
			</div>
		</div>
	</div>


	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="">
				<!-- <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo"> -->
				<h1 style="color: white;"><span>KeepReal.</span></h1>
				
			</a>

			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="dashboard.php" class="dropdown-toggle">
						  <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					  </li>
					  <li class="dropdown">
						<a href="dashboardproduct.php" class="dropdown-toggle">
						  <span class="micon dw dw-library"></span><span class="mtext">Product</span>
						</a>
					  </li>
					  <li class="dropdown">
						<a href="dashboardpesanan.php" class="dropdown-toggle">
						  <span class="micon dw dw-edit2"></span><span class="mtext">Pesanan</span>
						</a>
					  </li>
					  
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>