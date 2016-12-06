<?php
require_once("db.php");
require_once("login.php");
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

function updateItem($itemId, $name, $description, $stock, $price){
    $conn = get_Connection();
    $stmt = $conn->prepare("UPDATE Item SET name=:name, description=:description, stock=:stock, price=:price WHERE itemId=:itemId");
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":description", $description, PDO::PARAM_STR);
    $stmt->bindParam(":stock", $stock, PDO::PARAM_INT);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":itemId", $itemId, PDO::PARAM_STR);
    
    $result = $stmt->execute();
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
    echo(json_encode(getAllItems(), JSON_NUMERIC_CHECK));
}

if(isset($_POST['func']) && $_POST['func']=="updateItem"){
    print_r($_POST['item']);
    
    $item = $_POST['item'];
    
    $itemId = $item['itemId'];
    $name = $item['name'];
    $desc = $item['description'];
    $stock = $item['stock'];
    $price = $item['price'];
    
    if(isset($_SESSION['userId']) && $_SESSION['userId'] && $_SESSION['userLevel'] >= 1){
        updateItem($itemId, $name, $desc, $stock, $price);
    }
}

if(isset($_POST['func']) && $_POST['func']=="addItem"){
	//all form data is directly in the "$_POST" array, image data is in the format of:
	//
    print_r($_POST['item']);
}