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
        <p>:o) Hello. I am a webpage</p><br><br>

        <h4>IS A SESSION SET? (DISABLED = 0 NONE = 1 ACTIVE = 2)</h4>
        <?php
            print(session_status());
        ?>

        <h4>SESSION VARIABLES</h4>
        <?php
            print_r($_SESSION);
        ?>
    </div>
</body>
</html>