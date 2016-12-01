<!--
	partials/account.php
    author: Josh Varone
-->

<?php
	require_once '../php/login.php';
	require_once '../php/account.php';
?>

<h1>Your Account</h1>

<?php
	if(isset($_SESSION['userId']) && $_SESSION['userId']):
?>

<a ui-sref="purchases">View Your Purchase History</a>

<br><br>

<div class="col-md-6">

	<form action="" method="post" name="userInformation">

		<div class="form-group row">
			<label for="firstName" class="col-xs-3 col-form-label">First Name</label>
			<div class="col-xs-8">
				<input required class="form-control" type="text" name="firstName" id="firstName" value="<?php echo getUserElement('firstName'); ?>" />
			</div>
		</div>
		
		<div class="form-group row">
			<label for="lastName" class="col-xs-3 col-form-label">Last Name</label>
			<div class="col-xs-8">
				<input required class="form-control" type="text" name="lastName" id="lastName" value="<?php echo getUserElement('lastName'); ?>" />
			</div>
		</div>
		
		<div class="form-group row">
			<label for="email" class="col-xs-3 col-form-label">Email</label>
			<div class="col-xs-8">
				<input required class="form-control" type="text" name="email" id="email" value="<?php echo getUserElement('email'); ?>" />
			</div>
		</div>

		<div class="form-group row">
			<label for="username" class="col-xs-3 col-form-label">Username</label>
			<div class="col-xs-8">
				<input required class="form-control" type="text" name="username" id="username" value="<?php echo getUserElement('userName'); ?>" />
			</div>
		</div>

		<h3>Shipping Information</h3>
		
		<div class="form-group row">
			<label for="address" class="col-xs-3 col-form-label">Address</label>
			<div class="col-xs-8">
				<input required class="form-control" type="text" name="address" id="address" value="<?php echo getUserElement('address'); ?>" />
			</div>
		</div>
		
		<h3>Change Password</h3>
		
		<div class="form-group row">
			<label for="currentPassword" class="col-xs-3 col-form-label">Current</label>
			<div class="col-xs-8">
				<input class="form-control" type="password" name="currentPassword" id="currentPassword" />
			</div>
		</div>
		
		<div class="form-group row">
			<label for="newPassword1" class="col-xs-3 col-form-label">New</label>
			<div class="col-xs-8">
				<input class="form-control" type="password" name="newPassword1" id="newPassword1" />
			</div>
		</div>
		
		<div class="form-group row">
			<label for="newPassword2" class="col-xs-3 col-form-label">Retype New</label>
			<div class="col-xs-8">
				<input class="form-control" type="password" name="newPassword2" id="newPassword2" />
			</div>
		</div>
		
		<div class="form-group row">
			<div class="col=xs-12">
				<input type="submit" value="Save Changes" class="btn btn-primary" onclick="formhash(this.form, this.form.currentPassword, this.form.newPassword1, this.form.newPassword2);" />
			</div>
		</div>
		
	</form>

</div>

<div class="col-md-6"></div>

<?php else: ?>

Please log in to access your account information.<br>
<a ui-sref="login">Login</a>

<?php endif ?>