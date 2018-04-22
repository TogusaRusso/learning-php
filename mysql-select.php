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
    $q = $db->query('SELECT dish_name, price FROM dishes'); 
    while ($row = $q->fetch()) { 
        print "$row[dish_name], $row[price]</br>";
    }
}   catch ( PDOException $e ) {
    print "Couldn't show database: " . $e->getMessage(); 
}
