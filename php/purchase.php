<!--
    php/purchase.php
    Page with most of the PHP for purchase control
    author: Josh Varone
-->

<?php 
	require_once("db.php");
	require_once("login.php");

	//return all purchases for the current user.
	function getAllPurchases(){
		//Get the DB connection
		$conn = get_Connection();
		//Create and run query to get purchases for the user
		$sql = "SELECT * FROM Purchase WHERE userId = " . $_SESSION['userId'] . " ORDER BY purchaseDate DESC";
		$stmt = $conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	//JSON encode the returned data from getAllPurchases if it was requested
	if(isset($_GET['func']) && $_GET['func']=="getAllPurchases"){
		echo(json_encode(getAllPurchases(), JSON_NUMERIC_CHECK));
	}
?>