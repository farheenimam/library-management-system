<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Error:" .$conn->connect_error);
}

?>