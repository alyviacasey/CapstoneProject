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
        <section class = "profile">
            <div class = "profile-info">
                <div class = "profile-info-img">
                    <p>USERNAME</p>
                    <br>
                    <a href = "profilesettings.php">PROFILE SETTINGS</a>
                </div>
                <div class = "profile-about">
                    <h3>ABOUT</h3>
                    <p>Hello (:</p>
                </div>
            </div>
            <div class = "profile-content">
                <div class = "profile-content">
                    <h3>HI! MY NAME IS...</h3>
                    <p>Tell us about yourself!</p>
                </div>
            </div>
        </section>
    </div>
</body>
</html>