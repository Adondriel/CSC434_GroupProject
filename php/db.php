<?php
//Author: Adam Pine
function get_Connection(){
    //set the vars to connect to the database.
    //use 127.0.0.1 instead of localhost because localhost makes my local mysql take ~15-30 seconds to respond.
    $servername = "127.0.0.1";
    $username = "adamunbh_csc434";
    $password = "ThisAccountWillBeDeleted";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=adamunbh_ecommerce", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

//Get a mysqli connection, rather than a PDO connection for use with the login functionality.
function get_MySQLi_Connection(){
    //set the vars to connect to the database.
    //use 127.0.0.1 instead of localhost because localhost makes my local mysql take ~15-30 seconds to respond.
    $servername = "127.0.0.1";
    $username = "adamunbh_csc434";
    $password = "ThisAccountWillBeDeleted";
    // Create connection
    $conn = new mysqli($servername, $username, $password, "adamunbh_ecommerce");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    
    return $conn;
}

function createTables(){
    $conn = get_Connection();
    
    $sql = "
    DROP TABLE IF EXISTS `Item`;
CREATE TABLE `Item` (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET latin1 NOT NULL,
  `desription` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `price` double(20,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` longblob,
  PRIMARY KEY (`itemId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `Purchase`;
CREATE TABLE `Purchase` (
  `purchaseId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `purchasePrice` double(100,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`purchaseId`),
  KEY `userId` (`userId`),
  KEY `itemId` (`itemId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Rating`;
CREATE TABLE `Rating` (
  `ratingId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `rating` double(2,2) NOT NULL,
  `comment` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`ratingId`),
  KEY `userId` (`userId`),
  KEY `fk_itemId` (`itemId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `firstName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `lastName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `userLevel` tinyint(4) NOT NULL,
  `userName` varchar(32) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName_UNIQUE` (`userName`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/*user: adondriel pass:testing*/
INSERT INTO `User` VALUES (1,'adondrielcraft@gmail.com','ae2b1fca515949e5d54fb22b8ed95575',NULL,NULL,NULL,0,'adondriel');


DROP TABLE IF EXISTS `Wishlist`;
CREATE TABLE `Wishlist` (
  `wishListId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`wishListId`),
  KEY `userId` (`userId`),
  KEY `fk_itemId1212` (`itemId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;    
";
        
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();   
    }
    catch (PDOException $e){
        echo $e->getMessage();
        die();
    }            
}