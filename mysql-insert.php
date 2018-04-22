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
    $q = $db->exec("INSERT INTO dishes (dish_name, price, is_spicy) 
        VALUES ('Sesame Seed Puff', 2.50, 0)");    
    print 'Inserted';
}   catch ( PDOException $e ) {
    print "Couldn't insert a row: " . $e->getMessage(); 
}
