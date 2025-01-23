<?php
include "conn.php";

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    echo "request method is not collect";
}

extract ($_POST);

$sql="INSERT INTO `user`(`fullname`, `username`, `password`) VALUES ('$names','$user','$password')";
$result=$conn->query($sql);
header('location:signup.php');