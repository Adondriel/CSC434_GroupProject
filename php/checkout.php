<?php 
require_once("login.php");
require_once("db.php");

if(isset($_SESSION['userId']) && $_SESSION['userId']){
    //var_dump($_POST["cart"]);
        $inputFirstName = "";
        $inputLastName = "";
        $inputAddressLine1 = "";
        $inputAddressLine2 = "";
        $inputState = "";
        $inputCountry= "" ;
        $inputCity = "";
        $inputBillingName = "";
        $inputCardNumber = "";
        $inputSecurityCode = "";
        $inputCart = "";
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
            $inputCity = $_POST["inputCity"];
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
        if(isset($_POST["cart"]) )
        {
            $inputCart = $_POST["cart"];
        }



        
        $userId = (int) $_SESSION["userId"]; 
        $conn = get_MYSQLi_Connection();

        for($i = 0; $i < count($inputCart); $i++)
        {
            $itemId = (int) $inputCart[$i]["itemId"];
            $itemPrice = (double) $inputCart[$i]["price"];
            $itemQuantity = (int) $inputCart[$i]["quantity"];
            $itemNewStock = ((int) $inputCart[$i]["stock"]) - $itemQuantity;

            //echo $itemId."<br>";
            //echo $itemPrice."<br>";
            //echo $itemQuantity."<br>";
            //echo $itemNewStock."<br>";

            $item_query = $conn->prepare("update Item set stock = ? where itemId = ?");
            $item_query->bind_param("ii", $itemNewStock, $itemId);
            $item_query->execute();

            $purchase_query = $conn->prepare("insert into Purchase (userId, itemId, purchaseDate, purchasePrice, quantity) values(?,?,now(),?,?)");
            $purchase_query->bind_param("iidi", $userId, $itemId, $itemPrice, $itemQuantity);
            $purchase_query->execute();
        }
    }
?>
