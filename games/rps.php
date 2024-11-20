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
    <form action="game.php" method="post">
        <input type="radio" id="rock" name="user_choice" value="Rock" /><label for="rock">Rock</label> &nbsp; &nbsp;
        <input type="radio" name="user_choice" value="Paper" title="Paper" />Paper
        <input type="radio" name="user_choice" value="Scissors" title="Scissors" />Scissors
        <button type = "submit" name = "shoot">SHOOT</button>
    </form>
</body>
</html>