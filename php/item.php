<?php
require_once("db.php")

function getAllItems(){

	//get all current item in the database
	$conn = get_MySQLi_Connection();
	$stmt = "SELECT * FROM item";
	$result = $conn->query($stmt);
	$rows = $result->num_rows;
	//return $result;
}

function getItemByID($id){

	//return the specific item, with this specific ID.
	// $conn = get_MySQLi_Connection();
	// $query = sprintf("SELECT name, price, image  FROM item
  //   WHERE itemId='%i'",
  //   mysql_real_escape_string($id);
	//
	// $result = $conn->query($query);

}
