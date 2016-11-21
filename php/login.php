<?php
//Username: test_user Email: test@example.com Password: 6ZaxN2Vzm9NUJT2y

include_once 'db.php';
include_once 'functions.php';

echo phpinfo();

sec_session_start();

$return = array();
$logged = false;
if (login_check(get_MySQLi_Connection()) == true) {
    $logged = true;
} else {
    $logged = false;
}

$return['loginStatus'] = $logged;

echo json_encode($return);

