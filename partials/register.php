<form action="" method="post">
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

<label class="grey" for="username">Username:</label>
<input class="field" type="text" name="username" id="username" value="" size="23" />
<label class="grey" for="email">Email:</label>
<input class="field" type="text" name="email" id="email" size="23" />
<label class="grey" for="password">Password:</label>
<input class="field" type="text" name="password" id="password" size="23" />
<input type="submit" name="submit" value="Register" class="bt_register" />
</form>
