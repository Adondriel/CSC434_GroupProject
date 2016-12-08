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
		$sql = "SELECT * FROM Wishlist INNER JOIN Item ON Wishlist.itemId=Item.itemId where userId = $userId";
		$stmt = $conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
}

function removeItemFromWishlist($wishlistId){
	$userId = get_userId();
	if($userId > 0){
		$conn = get_Connection();
		//gets list of items, with the item information.
		$sql = "DELETE FROM Wishlist WHERE WishlistId=$wishlistId";
		$result = $conn->exec($sql);
		return $result;
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