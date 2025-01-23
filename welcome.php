<?php
include 'conn.php';
session_start();

// Redirect to welcome page if already logged in
if (isset($_SESSION['user'])) {
    header("location:welcome.php");
    exit();
}

// Initialize error message
$error = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0 ) {
        $error = "Incorrect username";
    } else {
        $user = $result->fetch_object();
        
        if ($password != $user->password) {
            $error = "Incorrect password";
        } else {
            // Store user information in the session
            $_SESSION['user'] = $user;
            header("location:welcome.php");
            exit();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <center>
        <h1>Login Form</h1>
        <b><?php echo $error; ?></b>
        <form action="#" method="post">
            <label for="">Username</label><br>
            <input name="username" type="text" required><br><br>
            <label for="">Password</label><br>
            <input name="password" type="password" required><br><br>
            <button type="submit">LOGIN</button><br>
            <p>Don't have an account? <br><a href="signup.php">Signup</a></p>
        </form>
    </center>
</body>
</html>
