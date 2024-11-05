<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventos";

$conn = new mysqli($servername, $username, $password, $dbname) or die("Falhou!");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}