    <?php require_once("../php/login.php"); 
	?>
	<?php 
      if(isset($_SESSION['userId']) && $_SESSION['userId'] && $_SESSION['userLevel'] >= 1):
	?>
		<div class="col-md-12">
			<button class="btn btn-success" ui-sref="additem">Add Item</button>
		</div>
		<div class="col-mid-12">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
					<th>Item</th>
					<th>Description</th>
					<th>Stock</th>
					<th>Price</th>
					<th></th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="item in items">
					<td><input type="text" ng-model="item.name"></td>
					<td><input type="text" ng-model="item.description"></td>
					<td><input type="number" min="0" ng-model="item.stock"></td>
					<td><input type="text" ng-model="item.price"></td>
					<td><a ng-click="updateItem(item)" ui-sref="admin"><i class="fa fa-check" aria-hidden="true"></a></i></td>
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