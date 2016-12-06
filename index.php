<?php
	require_once("php/login.php");
	require_once("php/account.php");
	require_once("php/checkout.php");
?>
	<!DOCTYPE html>
	<html>

	<head>

		<!-- CSS (load bootstrap) -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<style>
			.navbar {
				border-radius: 0;
			}
		</style>

		<!-- JS (load angular, ui-router, and our custom js file) -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.js"></script>
		<script src="js/ui-bootstrap-2.3.0.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.js"></script>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="js/angular-base64-upload.min.js"></script>

		<script src="js/app.js"></script>
		<script src="js/home.controller.js"></script>
		<script src="js/search.controller.js"></script>
		<script src="js/login.controller.js"></script>
		<script src="js/register.controller.js"></script>
		<script src="js/cart.controller.js"></script>
		<script src="js/admin.controller.js"></script>
		<script src="js/additem.controller.js"></script>
		<script src="js/products.controller.js"></script>
		<script src="js/account.controller.js"></script>
		<script src="js/account.validation.js"></script>
		<script src="js/purchase.controller.js"></script>
		<script src="js/checkout.controller.js"></script>
		<script src="js/wishlist.controller.js"></script>


		<!--<script type="text/JavaScript" src="js/sha512.js"></script>
	<script type="text/JavaScript" src="js/forms.js"></script>
	<script type="text/JavaScript" src="js/loginCheck.js"></script>-->


	</head>

	<!-- apply our angular app to our site -->

	<body ng-app="routerApp">

		<!-- NAVIGATION -->
		<nav ng-controller="loginController" class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" ui-sref="#">eCommerce</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a ui-sref="/">Home</a></li>
					<li><a ui-sref="products">Products</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<?php 
				    if(isset($_SESSION['userId']) && $_SESSION['userId']):
					?>
						<li uib-dropdown>
							<a uib-dropdown-toggle> My Account <span class="caret"></span></a>
							<ul uib-dropdown-menu>
								<li><a ui-sref="account">Manage</a></li>
								<li><a ui-sref="wishlist">Wishlist</a></li>
								<li><a ui-sref="purchases">Purchase History</a></li>
								<li class="divider"></li>
								<li><a href="php/login.php?logout=true">Logout</a></li>
							</ul>
						</li>
					<?php else: ?>
						<li><a ui-sref="login">Login</a></li>
						<li><a ui-sref="register">Register</a></li>
					<?php endif ?>
					
					<li><a ui-sref="checkout">Checkout</a></li>
					
					<?php 
				    if(isset($_SESSION['userLevel']) && $_SESSION['userLevel']>=1):
					?>
						<li><a ui-sref="admin">Admin</a></li>
					<?php endif ?>

				</ul>
				<div class="navbar-form navbar-right">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search" ng-model="searchTerm">
					</div>
					<button type="button" class="btn btn-default" ui-sref="search({searchTerm: searchTerm})">Submit</button>
				</div>
			</div>
		</nav>

		<!-- MAIN CONTENT -->
		<!-- THIS IS WHERE WE WILL INJECT OUR CONTENT ============================== -->
		<div class="container">
			<div ui-view></div>
		</div>
	</body>
	</html>