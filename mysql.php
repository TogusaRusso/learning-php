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
    print 'Connected';
}   catch ( PDOException $e ) {
    print "Couldn't connect to the database: " . $e->getMessage(); 
}
