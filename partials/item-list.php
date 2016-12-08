<?php
	include("../php/login.php");
?>
<div class="col-md-4" ng-repeat="item in items">
	<div class="col-md-12 center-block">	
		<img ng-show="item.image===null" src="assets/ph.svg" class="img-responsive center-block">
		<img ng-show="item.image!==null" data-ng-src="data:image/png;base64, {{item.image}}" class="img-responsive center-block">

	</div>
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 ui-sref="item({itemId: item.itemId})" class="panel-title">{{item.name}}
					<bdi class="panel-title" style="float: right;"> ${{item.price}}</bdi>
				</h3>
			</div>
			<div class="panel-body">
				<p>{{item.description}}</p>				
					<div class="col-md-6" style="padding-left: 0px;" ng-controller="cartController">
						<a ng-click="addItemToCart(item)" class="btn btn-info">Add to Cart</a>
					</div>
					<?php 
				    if(isset($_SESSION['userId']) && $_SESSION['userId']):
					?>
					<div class="col-md-6" ng-controller="wishlistController">
						<a ng-click="addItemToWishlist(item.itemId)" href="#" class="btn btn-success">Add to Wishlist</a>
					</div>
					<?php 
					endif
					?>
			</div>
		</div>
	</div>
</div>