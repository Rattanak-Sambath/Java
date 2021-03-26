<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "pagoda";
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
  die("Connected failed" . $conn->connect_error);
}
