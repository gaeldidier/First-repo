<?php
session_start();
require_once "conn.php";

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    die("Invalid request method");
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 0 ) {
   echo "Incorrect username";
   echo "<br><a href='login.php'>Try again</a>";
} else {
    $user = $result->fetch_object();

    if ($password != $user->password) {
        echo "Incorrect password";
        echo "<br><a href='login.php'>Try again</a>";
    } else {

        $_SESSION['user'] = $user;
        header("location:welcome.php");
        exit();
    }
}

$conn->close();
?>
