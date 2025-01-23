<?php
session_start();

require_once "conn.php";

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    die("Invalid request method");
}

extract($_POST);

// sql query for retrieving user into db
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

$result = $conn->query($sql);