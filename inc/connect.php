<?php

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

try {

    $pdo = new PDO("mysql:host=$hostname;dbname=biz", $username, $password);

    /*** echo a message saying we have connected ***/
    // echo 'Connected to database';/*** close the database connection ***/
    //  $dbh = null;
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>