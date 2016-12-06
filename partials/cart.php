<?php 
    require_once("../php/login.php");
?>

<div class="col-md-8">
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th></th>
      <th>Item</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="item in cart">
      <td><a ng-click="removeItem(item)" ui-sref="cart"><i class="fa fa-trash" aria-hidden="true"></a></i></td>
      <td>{{item.name}}</td>
      <td><input type="number" min="1" ng-model="item.quantity" ng-change="updateCart(cart)"></td>
      <td>{{item.quantity*item.price}}</td>
    </tr>
  </tbody>
</table> 
</div>
<div class="col-md-4">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Checkout</h3>
  </div>
  <div class="panel-body">
    <h4>Total: {{total()}}</h4>
    <?php 
      if(isset($_SESSION['userId']) && $_SESSION['userId']):
		?>
    <a ui-sref="checkout" class="btn btn-primary">Checkout</a>
    <?php 
        else:
    ?>
    <h3>Please login to checkout.</h3>
    <a class="btn btn-primary disabled">Checkout</a>
    <?php
      endif;
    ?>
  </div>
</div>
</div>
