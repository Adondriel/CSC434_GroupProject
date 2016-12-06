<?php require_once("../php/login.php");
?>
  <?php
if (isset($_SESSION['userId']) && $_SESSION['userId'] && $_SESSION['userLevel'] >= 1) :
    ?>
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
      <form class="form-horizontal" ng-submit="addItem()">
        <fieldset>
          <legend>Add Item</legend>
          <div class="form-group">
            <label for="txtItemName" class="col-lg-2 control-label">Item Name</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="txtItemName" name="txtItemName" ng-model="formData.txtItemName" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="txtDesc" class="col-lg-2 control-label">Description</label>
            <div class="col-lg-10">
              <textarea type="text" class="form-control" id="txtDesc" name="txtDesc" ng-model="formData.txtDesc" placeholder="Lorem ipsum">
              </textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="txtPrice" class="col-lg-2 control-label">Price</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="txtPrice" name="txtPrice" ng-model="formData.txtPrice" placeholder="Lorem ipsum">
            </div>
          </div>
          <div class="form-group">
            <label for="numStock" class="col-lg-2 control-label">Stock</label>
            <div class="col-lg-10">
              <input type="number" min="0" class="form-control" id="numStock" name="numStock" ng-model="formData.numStock" placeholder="Lorem ipsum">
            </div>
          </div>
          <div class="form-group">
            <label for="image" class="col-lg-2 control-label">Image</label>
            <div class="col-lg-10">
              <input type='file' id="image" ng-model='formData.image' accept="image/*" max-size="5000" base-sixty-four-input do-not-parse-if-oversize>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="reset" class="btn btn-default">Clear Form</button>
              <button type="submit" class="btn btn-primary">Add Item</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
    <div class="col-md-2">

    </div>
    <?php
else :
    ?>
      <p>You are not authorized to view this page.</p>
      <?php
endif;
?>