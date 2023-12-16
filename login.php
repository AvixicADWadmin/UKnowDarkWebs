<?php
    session_start();

        include("connection.php");
        include("functions.php");

        $user_data = check_login($conn);

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $user_name = $_POST['log'];
            $password = $_POST['pass'];

            if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
                $query = "select * from loginy where login = '$user_name' limit 1";

                $result = mysqli_query($conn, $query);

                if($result) {
                    if($result && mysqli_num_rows($result) > 0) {
                        $user_data = mysqli_fetch_assoc($result);
                        
                        if ($user_data['password'] === $password) {
                            $_SESSION['user_name'] = $user_data['login'];
                            
                            header("Location: index.php");
                            die;
                        }
                    }
                }
                echo("Wrong login or password !");
            }
            else {
                echo("Wrong login or password !");
            }
        }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <div style="font-size: 20px; margin: 10px;">Login</div><br>
            Login: <input id="text" type="text" name="log"><br><br>
            Password: <input id="text" type="password" name="pass"><br><br>
            <input id="button" type="submit" value="Login">
        </form>
        <br><br><a href="signup.php">Click to sign up</a>
    </div>
</body>
</html>