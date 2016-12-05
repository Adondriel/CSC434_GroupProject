<!--
    php/account.php
    Page with most of the PHP for account control
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

	function updateUser($firstName, $lastName, $email, $username, $address)
	{
		$cn = get_MySQLi_Connection();

        $result = $cn->query("UPDATE User
							SET firstName = '$firstName', lastName = '$lastName', email = '$email', userName = '$username', address = '$address'
							WHERE userId = " . $_SESSION['userId']);
        return $result;
	}

	function updatePassword($cur, $new1)
	{
		$cn = get_MySQLi_Connection();

        $result = $cn->query("UPDATE User SET password = '$new1' WHERE userId = " . $_SESSION['userId'] . " AND password = '$cur'");
        return $result;
	}

    //Pull a specific piece of user info from DB
    function getUserElement($element)
    {
        $user = getUser();
        if($user[$element]) return $user[$element];
        return "";
    }

	//If the form has been posted, attempt to apply changes
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//Begin form validation after postback
		$error = "";
		$firstName = $lastName = $email = $username = $address = "";
		$currentPass = $newPass1 = $newPass2 = "";
		
		//If everything except password is set, proceed
		if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['address']))
		{
			$firstName = fix_string($_POST['firstName']);
			$lastName = fix_string($_POST['lastName']);
			$email = fix_string($_POST['email']);
			$username = fix_string($_POST['username']);
			$address = fix_string($_POST['address']);

			$error .= validateFirstName($firstName);
			$error .= validateLastName($lastName);
			$error .= validateEmail($email);
			$error .= validateUsername($username);
			$error .= validateAddress($address);
		}
		else
		{
			//Not all requires fields were given
			$error .= "Missing required fields.\\n";
		}

		//If no errors reported, change the user data
		if ($error == "") updateUser($firstName, $lastName, $email, $username, $address);
		//Otherwise, give the errors
		else echo '<script type="text/javascript">alert("Please correct the following errors:\\n' . $error . '");</script>';

		//If any of the password fields are filled in, proceed to check password to change it
		//NOTE: This is intentionally handled completely separately from the rest of the validation
		if ((isset($_POST['currentPassword']) && $_POST['currentPassword'] != "") ||
			(isset($_POST['newPassword1']) && $_POST['newPassword1'] != "") ||
			(isset($_POST['newPassword2']) && $_POST['newPassword2'] != ""))
		{
			//Only proceed if all the fields are filled
			if ($_POST['currentPassword'] != "" && $_POST['newPassword1'] != "" && $_POST['newPassword2'] != "")
			{
				$currentPass = fix_string($_POST['currentPassword']);
				$newPass1 = fix_string($_POST['newPassword1']);
				$newPass2 = fix_string($_POST['newPassword2']);

				$passError = validatePassword($currentPass, $newPass1, $newPass2);

				//If no errors reported, change the data
				if ($passError == "")
				{
					if (updatePassword(md5($currentPass), md5($newPass1)))
						echo '<script type="text/javascript">alert("Your password was successfully updated.");</script>';
				}
				//Otherwise, give the errors
				else echo '<script type="text/javascript">alert("An error occurred processing your request.\\n' . $passError . '");</script>';
			}
			//Otherwise, one or more password fields was missing
			else echo '<script type="text/javascript">alert("One or more password fields was missing.");</script>';
		}
	}

	//Make sure first name entry is valid
	function validateFirstName($field)
	{
        //Make sure field is not blank
        if ($field == "") return "Please specify your first name.\\n";
        //Return an error if invalid input
		if (!preg_match("/^[a-zA-Z ,.'-]+$/", $field)) return "Invalid characters in first name.\\n";
		return "";
	}

	//Make sure last name entry is valid
    function validateLastName($field)
	{
        //Make sure field is not blank
        if ($field == "") return "Please specify your last name.\\n";
        //Return an error if invalid input
		if (!preg_match("/^[a-zA-Z ,.'-]+$/", $field)) return "Invalid characters in last name.\\n";
		return "";
	}

	//Make sure email entry is valid
	function validateEmail($field)
	{
        //Make sure field is not blank
        if ($field == "") return "Please specify an email address.\\n";
        //Return an error if invalid input
        if (!filter_var($field, FILTER_VALIDATE_EMAIL)) return "Invalid email address given.\\n";
		return "";
	}

	//Make sure username entry is valid
	function validateUsername($field)
	{
        //Make sure field is not blank
        if ($field == "") return "Please specify a username.\\n";
        //Return an error if invalid input
        if (!preg_match("/^[a-zA-Z0-9]+$/", $field)) return "Invalid characters in username.\\n";
		return "";
	}

	//Make sure address entry is valid (not blank)
	function validateAddress($field)
	{
        //Make sure field is not blank; unable to validate anything beyond that.
        if ($field == "") return "Please specify your address.\\n";
		return "";
	}

	//Make sure current password matches, and new password is valid
    function validatePassword($cur, $new1, $new2)
    {
		//Get user's current hashed password and compare to their entered one here
		if (getUserElement('password') != md5($cur)) return "Your current password was incorrect.\\n";
		//Check if the two new passwords match each other
		if ($new1 != $new2) return "Your new password and the confirmation do not match.\\n";
		return "";
    }

	//Fix string function to sanitize input
	function fix_string($string)
	{
		if (get_magic_quotes_gpc()) $string = stripslashes($string);
		return htmlentities ($string);
	}

?>