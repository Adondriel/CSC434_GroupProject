<?php
require_once("../php/login.php");
require_once("../php/db.php");

function get_wishlist($conn, $userId)
{
	$statement = $conn->query("select * from Wishlist where userId = $userId");
}

function get_userId()
{
	if(isset($_SESSION['userId']) && $_SESSION['userId'])
		return (int) $_SESSION['userId'];
	else
		return -1;
}




//----Main----
$conn = get_MYSQLi_Connection();
$wishlist_items = get_wishlist($conn, get_userId);
echo "hello world ;) idasdas";

?>
