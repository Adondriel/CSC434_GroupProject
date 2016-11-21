<?php
//Author: Adam Pine

include_once 'db.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
    $mysqli = get_MySQLi_Connection();

    if (login($email, $password, $mysqli) == true) {
        // Login success 
        header('Location: ../index.html');
    } else {
        // Login failed 
        header('Location: ../index.html');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}

$mysqli->close();