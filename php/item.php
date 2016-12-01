<?php 
require_once("db.php");

//return all items from DB.
function getAllItems(){
	$conn = get_Connection();
	$sql = "SELECT * FROM Item";
	
	$stmt = $conn->query($sql);
	
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	
	
	return $result;
}

function getItemByID($id){

	//return the specific item, with this specific ID.


}

function insertExampleItem(){
	$conn = get_Connection();
	$sql = "INSERT INTO Item(name, description, price, stock, image) VALUES
			('Item 1',
			'description1',
			25.52,
			50,
			null
			);";
	$result = $conn->exec($sql);
}

//Respond to the get request, and call the getAllItems function, and then json encode the data.
if(isset($_GET['func']) && $_GET['func']=="getAllItems"){
	echo(json_encode(getAllItems()));
}