<?php


$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'db_todolist';
$port = 3306;

$conn = new mysqli($host, $username, $password, $db_name, $port);
$conn->query("SET time_zone = '+07:00'");
if ($conn->connect_error) {
    die('Database Connection Failed !!' . $conn->connect_error);
}
$conn->query("SET time_zone = '+08:00'");
