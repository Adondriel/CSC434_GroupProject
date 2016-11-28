<?php
define('INCLUDE_CHECK',true);

require 'db.php';
require 'functions.php';

// Those two files can be included only if INCLUDE_CHECK is defined

session_name('tzLogin');
// Starting the session

session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks

session_start();
if(isset($_SESSION)){
	if(isset($_SESSION['userId']) && !isset($_COOKIE['tzRemember']) && !$_SESSION['rememberMe'])
	{
	// If you are logged in, but you don't have the tzRemember cookie (browser restart)
	// and you have not checked the rememberMe checkbox:

	$_SESSION = array();
	session_destroy();

	// Destroy the session
	}
}


if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	header("Location: index.php");
	exit;
}

if(isset($_POST['submit']) && $_POST['submit']=='Login')
{
	// Checking whether the Login form has been submitted

	$err = array();
	// Will hold our errors

	if(!$_POST['username'] || !$_POST['password'])
		$err[] = 'All the fields must be filled in!';

	if(!count($err))
	{
		$link = get_MySQLi_Connection();
		
		$_POST['username'] = $link::real_escape_string($_POST['username']);
		$_POST['password'] = $link::real_escape_string($_POST['password']);
		$_POST['rememberMe'] = (int)$_POST['rememberMe'];

		// Escaping all input data
		$result = $link->query("SELECT userId, userName, userLevel FROM User WHERE userName='{$_POST['username']}' AND password='".md5($_POST['password'])."'");
		$row = $result::fetch_assoc();

		if($row['username'])
		{
			// If everything is OK login

			$_SESSION['username']=$row['userName'];
			$_SESSION['userId'] = $row['userId'];
			$_SESSION['rememberMe'] = $_POST['rememberMe'];

			// Store some data in the session

			setcookie('tzRemember',$_POST['rememberMe']);
			// We create the tzRemember cookie
		}
		else $err[]='Wrong username and/or password!';
	}

	if($err)
		$_SESSION['msg']['login-err'] = implode('<br />',$err);
		// Save the error messages in the session

	header("Location: index.php");
	exit;
}else if(isset($_POST['submit']) && $_POST['submit']=='Register')
{
	// If the Register form has been submitted
	$err = array();

	if(strlen($_POST['username'])<4 || strlen($_POST['username'])>32)
	{
		$err[]='Your username must be between 3 and 32 characters!';
	}

	if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['username']))
	{
		$err[]='Your username contains invalid characters!';
	}

	if(!checkEmail($_POST['email']))
	{
		$err[]='Your email is not valid!';
	}

	if(!count($err))
	{
		$link = get_MySQLi_Connection();
		// If there are no errors
		//$pass = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
		// Generate a random password

		$_POST['email'] = mysqli_real_escape_string($link, $_POST['email']);
		$_POST['username'] = mysqli_real_escape_string($link, $_POST['username']);
		//$_POST['password'] = mysqli_real_escape_string($link, $_POST['username']);

		// Escape the input data

		$link->query("INSERT INTO User(userName,password,email,userLevel)
						VALUES('"
					 	.$_POST['username']."','"
					 	.md5($_POST['password'])."','"
					 	.$_POST['email'].
					 	"',0)");

		if(mysqli_affected_rows($link)==1)
		{
/*			send_mail(
					'test@test.com',
					$_POST['email'],
					'Registration System Demo - Your New Password',
					'Your password is: '.$pass);*/
					
					$_SESSION['msg']['reg-success']='We sent you an email with your new password!';
		}
		else $err[]='This username is already taken!';
	}

	if(count($err))
	{
		$_SESSION['msg']['reg-err'] = implode('<br />',$err);
	}

	header("Location: index.php");
	exit;
}

$script = '';
if($_SESSION['msg'])
{
	// The script below shows the sliding panel on page load
	$script = '
	<script type="text/javascript">
	$(function(){
		$("div#panel").show();
		$("#toggle a").toggle();
	});
	</script>';
}