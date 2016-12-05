    <?php require_once("../php/login.php"); 
	?>
	<?php 
      if(isset($_SESSION['userId']) && $_SESSION['userId'] && $_SESSION['userLevel'] >= 1):
	?>
		<div class="col-md-12">
			<a class="btn btn-success">Add Item</a>
		</div>
		<div class="col-mid-12">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
					<th>Item</th>
					<th>Description</th>
					<th>Stock</th>
					<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="item in items">
					<td><input type="text" ng-model="item.name" ng-change="updateCart(cart)"></td>
					<td><input type="text" ng-model="item.description" ng-change="updateCart(cart)"></td>
					<td><input type="number" min="0" ng-model="item.stock" ng-change="updateCart(cart)"></td>
					<td><input type="text" ng-model="item.price" ng-change="updateCart(cart)"></td>
					</tr>
				</tbody>
			</table> 
		</div>
	
	
	<?php 
        else:
    ?>
	<p>You are not authorized to view this page.</p>
    <?php
      endif;
    ?>