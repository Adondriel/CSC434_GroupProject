<?php 
	require_once("php/login.php");
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
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>	
	<script src="js/js.cookie.js"></script>
	<script src="js/app.js"></script>
	<script src="js/home.controller.js"></script>
	<script src="js/search.controller.js"></script>
	<script src="js/login.controller.js"></script>
	<script src="js/register.controller.js"></script>
	<script src="js/checkout.controller.js"></script>

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
				<li><a ui-sref="home">Home</a></li>
				<li><a ui-sref="products">Products</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<!-- Will add a conditional item here that will determine whether or not they are logged in, if so, will show diff buttons.-->
				<?php 
				    if(isset($_SESSION['userId']) && $_SESSION['userId']):
				?>
                				<li><a href="php/login.php?logout=true">Logout</a></li>
				<li><a ui-sref="wishlist">Wishlist</a></li>
				<li><a ui-sref="account">My Account</a></li>
				<?php else: ?>                
				<li><a ui-sref="login">Login</a></li>
				<li><a ui-sref="register">Register</a></li>
				<?php endif ?>
				<li><a ui-sref="checkout">Checkout</a></li>

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

<footer>
<script type="application/javascript">
	function Logout(){
		$.ajax({
			url: 'index.php?logout=true',
			type: 'GET'
		});
	}
</script>	
</footer>

</html>
