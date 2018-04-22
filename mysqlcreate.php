<?php

$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$database = "c9";
$dbport = 3306;

$pdoString = "mysql:host=$servername;dbname=$database;port=$dbport";

try {
    $db = new PDO($pdoString, $username, $password);
    // Do some stuff with $db here
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->exec("CREATE TABLE dishes ( 
        dish_id INT, 
        dish_name VARCHAR(255), 
        price DECIMAL(4,2), 
        is_spicy INT 
    )");    
    print 'Created';
}   catch ( PDOException $e ) {
    print "Couldn't create table: " . $e->getMessage(); 
}
