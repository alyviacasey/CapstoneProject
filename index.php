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
        <img src="../images/giftboxes/default.png" alt="box" style="width: 200px; height: 200px;"> <br>
        <h2>Hello, welcome to ToyBox!</h2>
        <p>This is a pet collection webgame where you can play games, earn coins, and spend them to acquire Boxes, which will give a randomized toy upon opening. Some toys are rarer than others, and may be more difficult to acquire. There are many new friends to meet, so join us!</p>
    </div>
</body>
</html>