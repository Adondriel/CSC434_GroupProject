<?php
require_once("../php/login.php");
//require_once("../php/db.php");
?>
<div class="col-md-12">
<table class="table table-striped table-hover ">
<tr>
	<th></th>
	<th>Item Name</th>
	<th>Description</th>
	<th>Price</th>
	<th>Date Added</th>
</tr>
		<tr ng-repeat="item in wishlist">
			<td align="center"><a ng-click="removeItemFromWishlist(item.wishListId)" ui-sref="wishlist"><i class="fa fa-trash" aria-hidden="true"></a></i></td>
			<td>{{item.name}}</td>
			<td>{{item.description}}</td>
			<td>{{item.price}}</td>
			<td>{{item.dateAdded}}</td>
		</tr>
</table>
</div>
<div class="col-md-4" ng-controller="cartController"> 
	<a ng-click="addWishlistToCart()" class="btn btn-info">Add Wishlist to Cart</a>
</div>


