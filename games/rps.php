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
    <script type="text/javascript" src="../scripts/rps.js" defer></script>
</head>

<body>
    <div style="padding: 5vw; overflow:hidden;">
        <h3 id = "result" style="text-align:center;">Rock, Paper, Scissors</h3> <br>
        <div class="rps">
            <span style = "transform: scaleX(-1);"><span id="rps-com"></span></span>
            <span><span id="rps-user"></span></span>
        </div>
        <br>
        <form id="rps-shoot" style="margin: auto; text-align:center;">
            <input type="radio" id="rock" name="user-choice" value="Rock" /><label for="rock">Rock</label> &nbsp; &nbsp;
            <input type="radio" id="paper" name="user-choice" value="Paper" /><label for="paper">Paper</label> &nbsp; &nbsp;
            <input type="radio" id="scissors" name="user-choice" value="Scissors" /><label for="scissors">Scissors</label> &nbsp; &nbsp;
            <button type = "submit" id = "submit" name = "shoot">SHOOT</button>
        </form>

        <form id="rps-restart" style="margin: auto; text-align:center;">
            <input type="hidden" id="score" name="score" value="0" />
            <button type = "submit" id = "rematch" name = "rematch" style = "display:none;">REMATCH</button>
        </form>
    </div>
</body>
</html>