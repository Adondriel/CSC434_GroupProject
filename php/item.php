<?php
require_once("db.php")

function getAllItems(){

	//get all current item in the database
	$conn = get_Connection();
	$stmt = "SELECT * FROM item";
	$result = $conn->query($stmt);

	//return all items from DB.
}

function getItemByID($id){

	//return the specific item, with this specific ID.
	
}
