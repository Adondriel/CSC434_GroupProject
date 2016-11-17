<?php
//Author: Adam Pine
function get_Connection(){
    //set the vars to connect to the database.
    //use 127.0.0.1 instead of localhost because localhost makes my local mysql take ~15-30 seconds to respond.
    $servername = "127.0.0.1";
    $username = "adamunbh_csc434";
    $password = "ThisAccountWillBeDeleted";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=adamunbh_csc434", $username, $password);
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
    $conn = new mysqli($servername, $username, $password, "adamunbh_csc434");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    
    return $conn;
}
//Src: W3Schools provided the code, but I made sure to figure out how it actually functions, and why.
//Recursive iterator helps us iterate through an interator, or basically this helps us make a table out of a "2D array" from the table results.
class TableRows extends RecursiveIteratorIterator { 
    //this calls the parent constructor, and tells it that there are 0 constants.
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }
    //this gets the current data value, for the current child, and surrounds it with <td> </td> so that it is formatted by the table correctly.
    function current() {
        return "<td>" . parent::current(). "</td>";
    }
    //when we start to read the row, print out a <tr>
    function beginChildren() { 
        echo "<tr>"; 
    } 
    //when we don't have anymore children left in this row, end the row with </tr> and a \n.
    function endChildren() { 
        echo "</tr>" . "\n";
    } 
}

//prints out all the variables as options to be surrounded by a select object.
class SelectOptionRow extends RecursiveIteratorIterator { 
    //this calls the parent constructor, and tells it that there are 0 constants.
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }
    //this gets the current data value, for the current child, and surrounds it with <td> </td> so that it is formatted by the table correctly.
    function current() {
        return " | " . parent::current();
    }
    //when we start to read the row, print out a <tr>
    function beginChildren() { 
        echo "<option value='".parent::current()."'>";
    } 
    //when we don't have anymore children left in this row, end the row with </tr> and a \n.
    function endChildren() { 
        echo "</option>";
    } 
}