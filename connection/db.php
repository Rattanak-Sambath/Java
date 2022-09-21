<?php
$server = "localhost";
// local
$username = "root";
$password = "";
$database = "library";
// 
// webhost
// $username = "id16458928_sophea";
// $password = "5n+Dz?v[fkg03~9p";
// $database = "id16458928_pagoda";
// 
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
  die("Connected failed" . $conn->connect_error);
}

