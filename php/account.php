<!--
    php/account.php
    author: Josh Varone
-->

<?php
    require_once 'db.php';
    require_once 'functions.php';

    //Get connection to database and user info
    function getUser()
    {
        $cn = get_MySQLi_Connection();

        $result = $cn->query("SELECT * FROM User WHERE userId = " . $_SESSION['userId']);
        return mysqli_fetch_assoc($result);
    }

    //Pull a specific piece of user info from DB
    function getUserElement($element)
    {
        $user = getUser();
        if($user[$element]) return $user[$element];
        return "";
    }

    //Begin form validation after postback
	$error = "";
	
	if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['address']))
	{
		$error .= validateName(fix_string($_POST['firstName']));
		$error .= validateName(fix_string($_POST['lastName']));
		$error .= validateEmail(fix_string($_POST['email']));
		$error .= validateUsername(fix_string($_POST['username']));
		$error .= validateAddress(fix_string($_POST['address']));
	}
	else
	{
		//Not all requires fields were given
		$error .= "Missing required fields.<br>";
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if ($error == "")
		{
			echo "User data successfully changed.<br>";
		}
		else
		{
			echo "Please correct the following errors:" . $error;
		}
	}

	function validateName($field)
	{
		return "Name validation <br>";
	}

	function validateEmail($field)
	{
		return "Email validation <br>";
	}

	function validateUsername($field)
	{
		return "Username validation <br>";
	}

	function validateAddress($field)
	{
		return "Address validation <br>";
	}

	//Fix string function to sanitize input
	function fix_string($string)
	{
		if (get_magic_quotes_gpc()) $string = stripslashes($string);
		return htmlentities ($string);
	}

?>