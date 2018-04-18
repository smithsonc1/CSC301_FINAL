<?php

// Connecting to the MySQL database
$username = "smithsonc1";
$password = "sweSP8Nu";

$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_spring18_smithsonc1', $username, $password);
//autoload
function my_autoloader($class) {
	include 'classes/class.' . $class . ".php";
}

spl_autoload_register('my_autoloader');
// Start the session
session_start();

$current_url = basename($_SERVER['REQUEST_URI']);

// if playerid is not set in the session and current URL not login.php redirect to login page
if (!isset($_SESSION["playerid"]) && $current_url != 'login.php' && $current_url != 'newuser.php?action=add' && $current_url != 'index.php') 
{
    header("Location: login.php");
}

// Else if session key playerid is set get $player from the database
elseif (isset($_SESSION["playerid"])) {
	$player1 = new Player($_SESSION["playerid"], $database);
}