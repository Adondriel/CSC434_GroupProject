<?php 

    require_once("item.php");
    if(isset($_SESSION['userId']) && $_SESSION['userId'])
    {
        //Shipping Info
        if(isset($_POST["inputFirstName"]) )
        {
            $inputFirstName = ($_POST["inputFirstName"]);
        }
        if(isset($_POST["inputLastName"]) )
        {
            $inputLastName = ($_POST["inputLastName"]);
        }
        if(isset($_POST["inputAddressLine1"]) )
        {
            $inputAddressLine1 = ($_POST["inputAddressLine1"]);
        }
        if(isset($_POST["inputAddressLine2"]) )
        {
            $inputAddressLine2 = ($_POST["inputAddressLine2"]);
        }
        if(isset($_POST["inputCity"]) )
        {
            $inputAddressLine2 = $_POST["inputCity"];
        }
        if(isset($_POST["inputState"]) )
        {
            $inputState = $_POST["inputState"];
        }
        if(isset($_POST["inputCountry"]) )
        {
            $inputCountry = $_POST["inputCountry"];
        }

        //Billing info
        if(isset($_POST["inputBillingName"]) )
        {
            $inputBillingName = $_POST["inputBillingName"];
        }
        if(isset($_POST["inputCardNumber"]) )
        {
            $inputCardNumber = $_POST["inputCardNumber"];
        }
        if(isset($_POST["inputSecurityCode"]) )
        {
            $inputSecurityCode = $_POST["inputSecurityCode"];
        }
    }
    echo print_r($_POST);
?>