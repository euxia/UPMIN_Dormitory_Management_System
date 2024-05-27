<?php
    session_start();
    include "php/database.php";
    if (!isset($_SESSION["valid"])) {
    header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello World!</h1>
    <a href="php/logout.php"> <button class="btn">Log Out</button></a>
    <p><?php echo $_SESSION["user"]["name"]; ?></p>
    <p><?php echo $_SESSION["user"]["yearlvl"]; ?></p>
    <p><?php echo $_SESSION["user"]["course"]; ?></p>
</body>
</html>