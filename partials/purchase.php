<!--
	partials/purchase.php
	Page with HTML table of purchases, uses Angular JS to display (and some PHP)
    author: Josh Varone
-->

<?php
	require_once '../php/login.php';
?>

<h1>Your Purchase History</h1>

<?php
	//If user is logged in, show User form
	if(isset($_SESSION['userId']) && $_SESSION['userId']):
?>

<!--Create a table of past purchases for the user-->
<table class="table">
	<tr>
		<th>Order Date</th>
		<th>Item Name</th>
		<th>Quantity</th>
		<th>Purchase Price</th>
	</tr> 
	<tr ng-repeat="p in purchases">
			<td>{{p.purchaseDate}}</td>
			<td>{{p.itemId}}</td>
			<td>{{p.quantity}}</td>
			<td>{{p.purchasePrice}}</td>
	</tr>
</table>

<?php 
	//If user is not logged in, take them to login page
	else: 
?>

Please log in to access your account information.<br>
<a ui-sref="login">Login</a>

<?php 
	//End of the PHP if statememt
	endif 
?>