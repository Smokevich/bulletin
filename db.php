<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'bulletin';

$dbConnect = mysqli_connect($host, $user, $pass, $db);

if(!$dbConnect) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($dbConnect, "SET NAMES 'utf8'");


?>