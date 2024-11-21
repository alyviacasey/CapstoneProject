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
    <div style="padding: 3vw">
        <h3 style="text-align:center;">Rock, Paper, Scissors</h3>
        <div style="height:300px; width:300px; background-color:white"></div>
        <form action="games-inc.php" method="post" style="margin-right: auto; margin-left: auto;">
            <input type="radio" id="rock" name="user-choice" value="Rock" /><label for="rock">Rock</label> &nbsp; &nbsp;
            <input type="radio" id="paper" name="user-choice" value="Paper" /><label for="paper">Paper</label> &nbsp; &nbsp;
            <input type="radio" id="scissors" name="user-choice" value="Scissors" /><label for="scissors">Scissors</label> &nbsp; &nbsp;
            <button type = "submit" name = "shoot">SHOOT</button>
        </form>
    </div>
</body>
</html>