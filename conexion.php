<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tienda_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error crítico de comunicación con la base de datos: " . $conn->connect_error);
}
?>