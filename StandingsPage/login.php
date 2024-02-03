<?php
    include __DIR__ . "/model/functions.php"; 

    if (isset($_POST['login'])) {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
    
        $user = login($username, $password);
        var_dump($username, $password);
    
        if(count($user)>0){
            echo 'HELLO';
            session_start();
            $_SESSION['user']=$username;
            header('Location: standings.php');
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
<body>

<form name="login_form" method="post">
        <h2>Login</h2>
       
        <!--FORM-->
        <div class="wrapper">
            <div class="label">
                <label>Username:</label>
            </div>
            <div>
                <input type="text" name="username" value="<?= $username; ?>" />
            </div>
            <div class="label">
                <label>Password:</label>
            </div>
            <div>
                <input type="password" name="password" value="<?= $password; ?>" />
            </div>

            <div>
                &nbsp;
            </div>

            <div>
                <input type="submit" name="login" value="Login" />
            </div>
           
        </div>

       
    </form>
    
</body>
</html>