<?php
    session_start();

        include("connection.php");
        include("functions.php");

        $user_data = check_login($conn);

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $user_name = $_POST['log'];
            $password = $_POST['pass'];

            if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
                $query = "insert into loginy (login, password) values ('$user_name','$password')";

                mysqli_query($conn, $query);

                header("Location: login.php");
                die;
            }
            else {
                echo("Please enter some valid information !");
            }
        }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <style type="text/css">
        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }

        #box {
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
     </style>

     <div id="box">
        <form method="POST">
            <div style="font-size: 20px; margin: 10px;">Sign Up</div><br>
            Login: <input id="text" type="text" name="log"><br><br>
            Password: <input id="text" type="password" name="pass"><br><br>
            <input id="button" type="submit" value="Sign Up">
        </form>
        <br><br><a href="login.php">Click to login</a>
    </div>
</body>
</html>