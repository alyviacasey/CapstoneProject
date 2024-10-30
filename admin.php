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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/stars.js" defer></script>
</head>

<body>
    <?php include_once "header.php"; 
    
    include "classes/dbh.classes.php";
    include "classes/model.classes.php";

    ?>

    <div class = "wrapper">
        <?php
            if($_SESSION["admin"] == 1)
            {
        ?>

        <section class = "admin">
            <h2>ADMIN PANEL</h2>
            <br>
            <div class = "admin-model">
                <h2>Toy Model Creator</h2>
                <br>
                <form action = "includes/model.inc.php" method = "post">
                    <h4>Theme</h4>
                    <p>Choose an adjective to describe the toy model</p>
                    <input type = "text" name = "theme" rows="10" cols="30" placeholder = "Birthday"> <br>
                    <br>
                    <h4>Model Name</h4>
                    <p>Choose an noun to describe the toy model</p>
                    <input type = "text" name = "model" placeholder = "Bear"> <br>
                    <br>
                    <h4>Model Material</h4>
                    <input type="radio" id="plush" name="material" value="Plush">
                    <label for="plush">Plush</label> &nbsp; &nbsp;
                    <input type="radio" id="plastic" name="material" value="Plastic">
                    <label for="plastic">Plastic</label> <br>
                    <br>
                    <h4>Rarity</h4>
                    <p>Select a rarity for this pet</p>
                    <input type="hidden" id="rarity" name="rarity" value="0">
                    <div class = "stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <br>
                    <button type = "submit" name = "submit">SAVE</button>
                </form>
            </div>
        </section>

        <?php
                }
                else
                {
        ?>

        <h2>You do not have permission to view this page!</h2>

        <?php } ?>
    </div>
</body>
</html>