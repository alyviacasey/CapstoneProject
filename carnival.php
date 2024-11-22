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
    <?php include_once "header.php"; ?>
    <div class = "wrapper">
        <?php
                if(isset($_SESSION["userid"]))
                {
        ?>
        <iframe src="games/rps.php" width="100%" height="650px" frameborder="0" scrolling="no"></iframe>
        <?php
                }
                else
                {
        ?>
        <h2>Please <a href = "signup.php">sign up</a> or <a href = "signup.php">log in</a> to play!</h2>
        <?php
                }
        ?>
    </div>
</body>
</html>