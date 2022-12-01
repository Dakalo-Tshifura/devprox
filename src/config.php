<?php

$host = "localhost";
$user = "root";
$database = "devprox";

$conn = new mysqli($host, $user, "", $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
return $conn;

?>