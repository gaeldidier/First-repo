<?php
include 'conn.php';
session_start();

if(isset($_SESSION['user'])){
    header("location:welcome.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
        <h1>Login form</h1>
        <b>
            <?php
            
            // session_start();
            require_once "conn.php";
            
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
           
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM user WHERE username = '$username'";
            $result = $conn->query($sql);
            
            if ($result->num_rows == 0 ) {
               echo "Incorrect username";
            } else {
                $user = $result->fetch_object();
            
                if ($password != $user->password) {
                    echo "Incorrect password";
                    
                } else {
            
                    $_SESSION['user'] = $user;
                    header("location:welcome.php");
                    exit();
                }
            }}
            
            $conn->close();
            ?>
        </b>
        <form action="#" method="post">
            <label for="">Username</label><br>
            <input name="username" type="text"><br><br>
            <label for="">Password</label><br>
            <input name="password" type="password"><br><br>
            <button type="submit">LOGIN</button><br>
            <p>already have account? <br><a href="signup.php">signup</a></p>
        </form>
    </center>
</body>
</html>