<?php
require_once("login.php");
require_once("db.php");

function get_userId()
{
	if(isset($_SESSION['userId']) && $_SESSION['userId'])
		return (int) $_SESSION['userId'];
	else
		return -1;
}

function get_wishlist()
{
	$userId = get_userId();
	if($userId > 0){
		$conn = get_Connection();
		//gets list of items, with the item information.
		$sql = "SELECT * FROM Wishlist INNER JOIN item ON wishlist.itemId=item.itemId where userId = $userId";
		$stmt = $conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}else{
		header("Location: #");
	}
}

function removeItemFromWishlist($wishlistId){
	$userId = get_userId();
	if($userId > 0){
		$conn = get_Connection();
		//gets list of items, with the item information.
		$sql = "DELETE FROM Wishlist WHERE wishlistId=$wishlistId";
		$result = $conn->exec($sql);
		return $result;
	}else{
		header("Location: #");
	}
}


function addItemToWishlist($itemId){
	$userId = get_userId();
	if($userId > 0){
		$conn = get_Connection();
		//gets list of items, with the item information.
		$sql = "INSERT INTO Wishlist(userId, itemId, dateAdded) VALUES ($userId, $itemId, now())";
		$result = $conn->exec($sql);
		return $result;
	}else{
		header("Location: #");
	}
}

if(isset($_POST['func']) && $_POST['func']=="getWishlist"){
	$wishlist_items = get_wishlist();
	echo(json_encode($wishlist_items, JSON_NUMERIC_CHECK));
}

if(isset($_POST['func']) && $_POST['func']=="addItemToWishlist"){
	$itemId = $_POST['itemId'];
	addItemToWishlist($itemId);
}

if(isset($_POST['func']) && $_POST['func']=="removeItemFromWishlist"){
	$wishlistId = $_POST['wishlistId'];
	removeItemFromWishlist($wishlistId);
}



?>