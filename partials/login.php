<div class="col-lg-3">
	</div>
<div class="col-lg-6">
<!-- Login Form -->
<form id="login-form" name="login-form" class="form-horizontal" action="" method="post">
<h1>Member Login</h1>

<?php
if(isset($_SESSION['msg']['login-err']) && $_SESSION['msg']['login-err'])
{
	echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
	unset($_SESSION['msg']['login-err']);
	// This will output login errors, if any
}
?>
<div class="form-group">
	<label class="col-lg-2 control-label" for="username">Username:</label>
	<div class="col-lg-10">
		<input class="form-control" type="text" name="username" id="username" value="" size="23" />
	</div>
</div>
<div class="form-group">
	<label class="col-lg-2 control-label" for="password">Password:</label>
	<div class="col-lg-10">
		<input class="form-control" type="password" name="password" id="password" placeholder="password" size="23" />
		<div class="checkbox">			
			<label><input name="rememberMe" id="rememberMe" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</label>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-lg-10 col-lg-offset-2">
        <button type="submit" name="submit" value="Login" class="btn btn-primary">Submit</button>
      </div>
	</div>
</form>

</div>
<div class="col-lg-3">
	</div>