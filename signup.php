<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toybox</title>
    <link rel="stylesheet" href="/css/style.css"> 
    <link rel="stylesheet" href="/css/reset.css"> 
</head>
<body>
    <?php include_once "header.php" ?>
    <div class = "wrapper"> 
        <div>
            <h4>SIGN UP</h4>
            <form action = "includes/signup.inc.php" method = "post">
                <input type="text" name="usn" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                <input type="text" name="email" placeholder="E-mail">
                <br>
                <button type="submit" name="submit">SIGN UP</button>
            </form>
        </div>

        <div>
            <h4>LOGIN</h4>
            <form action = "includes/login.inc.php" method="post">
                <input type="text" name="usn" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <br>
                <button type="submit" name="submit">LOGIN</button>
            </form>
        </div>
    </div>
</body>
</html>