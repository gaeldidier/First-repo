<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <center>
   <form action="#" method="post">
        <laber>username</laber><br>
        <input type="text"><br><br>
        <laber>password</laber><br>
        <input type="password"><br><br>
        <button type="submit">login</button>
    </form>
   </center>
</body>
</html>
<?php
 include 'conn.php';
 if($_SERVER['REQUEST_METHOD'] != 'POST'){
    echo "invalid request method!";
 }

 extract ($_POST);

 $sql=""