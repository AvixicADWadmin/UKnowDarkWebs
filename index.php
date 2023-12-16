<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test1</title>
</head>
<body>
    <h1><center>Strona testowa</center></h1>

    <a href="logout.php">Logout</a>
</body>
</html>