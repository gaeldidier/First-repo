<?php

require_once "conn.php";

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    die("Invalid request method");
}

extract($_POST);


$sql = "INSERT INTO user(username, password, fullname) VALUES('$username','$password','$names')";

$conn->query($sql);

echo "Account created well!";

echo "<br> Please <a href='login.php'>login</a> to continue";