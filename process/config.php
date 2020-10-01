<?php 
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dsadmin');


//URL
define('URLROOT', 'http://localhost/quickie');


//APP URL
define('APPROOT', dirname(__FILE__));


require_once 'function.php';


//make database connection
$objDB = objDB();


?>