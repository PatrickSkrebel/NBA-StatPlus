<?php
    include __DIR__ . "/model/functions.php"; 

    if (isset($_POST['login'])) {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
    
        $user = login($username, $password);
    
        if(count($user)>0){
            echo 'HELLO';
            session_start();
            $_SESSION['user']=$username;
            header('Location: standingsPage.php');
        }else{
            session_unset(); 
        }
    
    }else{
        $username = '';
        $password = '';

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<style>
        body{
            width:470px;
            height: 240px;
            display: grid;
            place-content: center;
            margin-top: 80px;
            margin-left: 100px;
        }

        form{
            width: 300px;
            height: 340px;
            display: grid;
            place-content: center;
            background-color: lavender;
            color: black;
            border-radius: 20px;
        }

        input{
            height: 25px;
            width: 220px;
            border-radius: 12px;
            background-color: lavender;
            border-color: lavenderblush;
            box-shadow: 0 0 5px 5px lavender;
            display: grid;
            place-content: center;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        button{
            height: 30px;
            width: 230px;
            color: black;
            background-color: white;
            border-color: lavenderblush;
            border-radius: 12px;
        }

        h1{
            font-size: 34px;
            display: grid;
            place-content: center;
        }

        a{
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
</style>

<body>

<form name="login_form" method="post">

        <h2>Login</h2>
        <label>Username:</label>
        <input type="text" name="username" value="<?= $username; ?>" />
        <label>Password:</label>
        <input type="password" name="password" value="<?= $password; ?>" />
        <p><a href="#">Forgot password?</a></p>
        <input type="submit" name="login" value="Login" />
        <p>Don't have an account?<a href="#">Register</a></p>
       
    </form>
    
</body>
</html>