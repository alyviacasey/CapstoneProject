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
    <?php include_once "header.php"; 
    
    include "classes/dbh.classes.php";
    include "classes/profile.classes.php";
    include "classes/profile-view.classes.php";

    $profile = new ProfileView();
    ?>

    <div class = "wrapper">
        <section class = "profile">
            <div class = "profile-info">
                <div class = "profile-info-img">
                </div>
                <div class = "profile-about">
                    <h3><?php echo $_SESSION["username"]; ?></h3>
                    <p>
                    <?php $profile->fetchAbout($_SESSION["userid"]); ?>
                    </p>
                    <br><br>
                </div>
            </div>
            <div class = "profile-content">
                <div class = "profile-intro">
                    <h3>
                        <?php $profile->fetchIntroTitle($_SESSION["userid"]); ?>
                    </h3>
                    <p>
                        <?php $profile->fetchIntroText($_SESSION["userid"]); ?>
                    </p>
                    <br><br>
                    <a href = "profilesettings.php">PROFILE SETTINGS</a> &nbsp; &nbsp; <a href = "inventory.php">INVENTORY</a> &nbsp; &nbsp; <a href = "collection.php">COLLECTION</a> &nbsp; &nbsp; <?php if($_SESSION["admin"] == 1) { ?> <a href = "admin.php">ADMIN PANEL</a> <?php } ?>
                    <br><br>
                </div>
            </div>
        </section>
    </div>
</body>
</html>