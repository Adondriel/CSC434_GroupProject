<?php 
    require_once("../php/login.php");
    require_once("../php/checkout.php")
?>

<!-- Both Shipping and Billing form -->
<form id="checkout_form" name="checkout_form" class="form-horizontal" method="post" ng-submit="submit($event, this)" >
        <legend>Shipping Information</legend>
        <div class="form-group">
          <label for="inputFirstName" class="col-lg-2 control-label">First Name</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputFirstName" name="inputFirstName" ng-model="formData.inputFirstName" placeholder="eg: John" type="text">
          </div>
        </div>
        <div class="form-group">
          <label for="inputLastName" class="col-lg-2 control-label">Last Name</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputLastName" name="inputLastName" ng-model="formData.inputLastName" placeholder="eg: Doe" type="text">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddressLine1" class="col-lg-2 control-label">Address Line 1</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputAddressLine1" name="inputAddressLine1" ng-model="formData.inputAddressLine1" placeholder="eg: 1871 Old Main Drive" type="text">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddressLine2" class="col-lg-2 control-label">Address Line 2</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputAddressLine2" name="inputAddressLine2" ng-model="formData.inputAddressLine2" placeholder="eg: Apartment P" type="text">
          </div>
        </div>
        <div class="form-group">
          <label for="inputCity" class="col-lg-2 control-label">City</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputCity" name="inputCity" ng-model="formData.inputCity" placeholder="eg: Shippensburg" type="text">
          </div>
        </div>
        <div class="form-group">
          <label for="inputState" class="col-lg-2 control-label">State/Province/Region</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputState" name="inputState" ng-model="formData.inputState" placeholder="eg: Pennsylvania" type="text">
          </div>
        </div>
        <div class="form-group">
          <label for="inputCountry" class="col-lg-2 control-label">Country</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputCountry" name="inputCountry" ng-model="formData.inputCountry" placeholder="eg: United States of America" type="text">
          </div>
   
    <legend>Billing Information</legend> 
        <div class="form-group">
          <label for="inputBillingName" class="col-lg-2 control-label">Full Name On Card</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputBillingName" name="inputBillingName" ng-model="formData.inputBillingName" placeholder="eg: John Doe" type="text">
          </div>
        </div>
        <div class="form-group">
          <label for="inputCardNumber" class="col-lg-2 control-label">Number on Credit Card</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputCardNumber" name="inputCardNumber" ng-model="formData.inputCardNumber" placeholder="eg: 5500 0000 0000 0004" type="text">
          </div>
        </div>
        <div class="form-group">
          <label for="inputSecurityCode" class="col-lg-2 control-label">Security Code</label>
          <div class="col-lg-10">
            <input class="form-control" id="inputSecurityCode" name="inputSecurityCode" ng-model="formData.inputSecurityCode" placeholder="eg: 123" type="text">
          </div>
        </div>
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
</form>
