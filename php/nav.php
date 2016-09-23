<?php
/**
 * Author: Candace Petty
 * File Name: nav.php
 * Date: 11/16/2015
 */

//Remote Development
define('DB_NAME', 'campetty_db');
define('DB_USER', 'campetty');
define('DB_PASSWORD', 'campetty');
define('DB_HOST', 'localhost');

//Local Development
//define('DB_NAME', 'campetty_db');
//define('DB_USER', 'phpuser');
//define('DB_PASSWORD', 'phpuser');
//define('DB_HOST', 'localhost');

//Defines Variables to Connect to Database
$server = DB_HOST;
$user = DB_USER;
$password = DB_PASSWORD;
$db_name = DB_NAME;

//Declare a New Instance of Database Connection
$connection = new mysqli($server, $user, $password, $db_name);

//If Not Link Display Message "Could Not Connect"
if(!$connection) {

    //Error Message that Halts Database from Running
    die('could not connect: '. $connection->error);

} else {

    //Retrieves Everything from the Navigation Table in the Database
    $result = $connection->query("SELECT * FROM navigation");

    //Return Array of Menu Button Objects
    $menuBtnObj = array();

    //Retrieve the Data from the Database Connection and Store the Array of Menu Button Objects Into a Variable Called "$rows"
    while ($rows = mysqli_fetch_assoc($result)) {
        $menuBtnObj[] = $rows;
    }

    //Encode the Array of Menu Button Objects with JSON
    print json_encode($menuBtnObj);

    //Closes Connection to the Database
    $connection->close();
}