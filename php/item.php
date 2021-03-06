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
    $conn = get_Connection();
    $sql = "SELECT * FROM Item where itemId=$id";    
    $stmt = $conn->query($sql);    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);   
    return $result;    
}

function updateItem($itemId, $name, $description, $stock, $price){
    //string sanitization is done by PDO here, at least in terms of sql injection, and this is only executed by admin users.
    $conn = get_Connection();
    $stmt = $conn->prepare("UPDATE Item SET name=:name, description=:description, stock=:stock, price=:price WHERE itemId=:itemId");
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":description", $description, PDO::PARAM_STR);
    $stmt->bindParam(":stock", $stock, PDO::PARAM_INT);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":itemId", $itemId, PDO::PARAM_STR);
    
    $result = $stmt->execute();
}

function addItem($name, $description, $price, $stock, $image){
     //sanitization is done by PDO here,only executed by admin users.
    $conn = get_Connection();
    $stmt = $conn->prepare("INSERT INTO Item (name, description, price, stock, image) VALUES (:name, :description, :price, :stock, :image);");
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":description", $description, PDO::PARAM_STR);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":stock", $stock, PDO::PARAM_INT);
    $stmt->bindParam(":image", $image, PDO::PARAM_LOB);

  
    $result = $stmt->execute();
}

function getRatings($itemId){
    $conn = get_Connection();
    $sql = "SELECT R.ratingId, R.userId, R.itemId, R.rating, R.`comment`, U.userName FROM Rating AS R INNER JOIN User AS U ON U.userId=R.userId WHERE itemId=:itemId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addRating($userId, $itemId, $rating, $comment){
    $conn = get_Connection();
    $sql = "INSERT INTO Rating(userId, itemId, rating, comment) VALUES (:userId, :itemId, :rating, :comment)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
    $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $result = $stmt->execute();
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

//Recieve a post and 
if(isset($_POST['func']) && $_POST['func']=="addItem"){
	//all form data is directly in the "$_POST['item']" object, image data is in the format of:
	//image =   {
    //"filesize": 54836, /* bytes */
    //"filetype": "image/jpeg",
    //"filename": "profile.jpg",
    //"base64":   "/9j/4AAQSkZJRgABAgAAAQABAAD//gAEKgD/4gIctcwIQA..."
  	//}
	//for example, image should be accessed from "$_POST['item']['image']['base64']" (I think)
	//You will only need to place the "base64" property into the DB, we don't really care about the other things.
	//File size is limited clientside, to 5MB (5000kb), if you want to verify that.'
	//Be careful if you upload a file file >2mb, it will freeze chrome dev tools if you try to look at the output of the line below.
	//Eventually it will come back, but it is very very slow to display the info.
	
	//print_r($_POST['item']);

    $item = $_POST['item'];
    
    $name = filter_var($item['txtItemName'], FILTER_SANITIZE_STRING);
    $desc = filter_var($item['txtDesc'], FILTER_SANITIZE_STRING);
    $stock = filter_var($item['numStock'], FILTER_SANITIZE_NUMBER_INT) ;
    $price = filter_var($item['txtPrice'], FILTER_SANITIZE_NUMBER_FLOAT);
    $image = $_POST['item']['image']['base64'];
    
    if(isset($_SESSION['userId']) && $_SESSION['userId'] && $_SESSION['userLevel'] >= 1){
        addItem($name, $desc, $stock, $price, $image);
    }
}

if(isset($_POST['func']) && $_POST['func']=="getItemById"){
    $id = filter_var($_POST['itemId'], FILTER_SANITIZE_NUMBER_INT);
    echo(json_encode(getItemByID($id), JSON_NUMERIC_CHECK));
}


if(isset($_POST['func']) && $_POST['func']=="getRatings"){
    $itemId = filter_var($_POST['itemId'], FILTER_SANITIZE_NUMBER_INT);
    echo(json_encode(getRatings($itemId)));
}

if(isset($_POST['func']) && $_POST['func']=="submitRating"){
    if(isset($_SESSION['userId']) && $_SESSION['userId']){
        $userId = $_SESSION['userId'];
        $itemId = filter_var($_POST['itemId'], FILTER_SANITIZE_NUMBER_INT);
        $rating = filter_var($_POST['rating'], FILTER_SANITIZE_NUMBER_INT);
        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        addRating($userId, $itemId, $rating, $comment);
    }
}
?>
