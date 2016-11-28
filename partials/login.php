<div class="left">
<!-- Login Form -->
<form class="clearfix" action="" method="post">
<h1>Member Login</h1>

<?php
if($_SESSION['msg']['login-err'])
{
	echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
	unset($_SESSION['msg']['login-err']);
	// This will output login errors, if any
}
?>

<label class="grey" for="username">Username:</label>
<input class="field" type="text" name="username" id="username" value="" size="23" />
<label class="grey" for="password">Password:</label>
<input class="field" type="password" name="password" id="password" size="23" />
<label><input name="rememberMe" id="rememberMe" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</label>
<div class="clear"></div>
<input type="submit" name="submit" value="Login" class="bt_login" />
</form>

</div>
