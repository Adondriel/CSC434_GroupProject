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