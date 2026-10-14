<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'db_venue';

$conn = new mysqli ($host, $user, $password, $database);

if ($conn->connect_error) {
    die(''. $conn->connect_error);
}

?>