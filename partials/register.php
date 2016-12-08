<div class="col-lg-3">
</div>

<div class="col-lg-6">
<form class="form-horizontal" action="" method="post">
<h1>Not a member yet? Sign Up!</h1>

<?php

if(isset($_SESSION['msg']['reg-err']) && $_SESSION['msg']['reg-err'])
{
	echo '<div class="err">'.$_SESSION['msg']['reg-err'].'</div>';
	unset($_SESSION['msg']['reg-err']);
	// This will output the registration errors, if any
}

if(isset($_SESSION['msg']['reg-success']) && $_SESSION['msg']['reg-success'])
{
	echo '<div class="success">'.$_SESSION['msg']['reg-success'].'</div>';
	unset($_SESSION['msg']['reg-success']);
	// This will output the registration success message
}

?>
<div class="form-group">
	<label class="col-lg-2 control-label" for="username">Username:</label>
	<div class="col-lg-10">
		<input class="form-control" type="text" name="username" id="username" placeholder="username" value="" size="23" />
	</div>
</div>
<div class="form-group">
	<label class="col-lg-2 control-label" for="email">Email:</label>
	<div class="col-lg-10">
		<input class="form-control" type="text" name="email" id="email" placeholder="email@example.com" size="23" />
	</div>
</div>
<div class="form-group">
	<label class="col-lg-2 control-label" for="password">Password:</label>
	<div class="col-lg-10">
		<input class="form-control" type="text" name="password" id="password" placeholder="password" size="23" />
	</div>
</div>
<div class="form-group">
	<div class="col-lg-10 col-lg-offset-2">
		<input type="submit" name="submit" value="Register" class="btn btn-primary" />
	</div>
</div>

</form>
</div>
<div class="col-lg-3">
</div>

