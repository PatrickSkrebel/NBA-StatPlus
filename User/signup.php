<?php
    include __DIR__ . "/Model/functions.php";

    $UNameErr = $passErr = $ErrorMessage = "";
    $UName = $Pass = "";

    $isAdmin = 0;

    $uBool = false;
    $pBool = false;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = filter_input(INPUT_POST, 'userID');

        // First Name validation
        if(empty($_POST["userName"])){
            $UNameErr = "* User Name is Required";
        }else{
            $UName = test_input($_POST["userName"]);
            $uBool = true;
        // regex validation
        if (!preg_match("/^[a-zA-Z-' ]*$/",$UName)) {
                $UNameErr = "Only letters and white space allowed";
            }
        }

        if(empty($_POST["userPassword"])){
            $passErr = "* Password is Required";
        }else{
            $Pass = test_input($_POST["userPassword"]);
            $pBool = true;
        // regex validation
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$Pass)) {
                $passErr = "Only letters and white space allowed";
            }
        }
    

        if($uBool && $pBool == true)
        {
            addUser($UName, $Pass, $isAdmin);

            header('Location: login.php');
        }

    }else{
        $ErrorMessage = "";
    }


    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0; /* Removes default body margin */
        }

        form{
            width: 300px;
            height: 400px;
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

<form name="login_form" method="POST">
        <h1>Welcome!</h1>
        <span class="error"><?= $ErrorMessage;?></span>
        <h2>Signup</h2>
        <label>Username:</label>
        <input type="text" name="userName" value="<?= $UName; ?>" />
        <span class="error"><?= $UNameErr;?></span>
        <label>Password:</label>
        <input type="password" name="userPassword" value="<?= $Pass; ?>" />
        <span class="error"><?= $passErr;?></span>
        <input type="submit" name="signup" value="Sign Up" />
        <p><a href="../StandingsPage/standingsPage.php">Back</a></p>
    </form>
    
</body>
</html>