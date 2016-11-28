<?php

if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');
include_once("db.php");

/* Database config */

$db_host		= 'webprog.cs.ship.edu';
$db_user		= 'webprog26';
$db_pass		= 'bilimeko';
$db_database	= 'webprog26'; 

/* End config */



$link = get_MySQLi_Connection();
/*mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");*/

?>