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
    include "classes/model.classes.php";

    ?>

    <div class = "wrapper">
        <section class = "admin">
            <h2>ADMIN PANEL</h2>
            <br><br>
            <form action = "includes/admin.inc.php" method = "post">
                <h3>Theme</h3>
                <p>Choose an adjective to describe the toy model</p>
                <input type = "text" name = "theme" rows="10" cols="30" placeholder = "Birthday"> <br>
                <br><br>
                <h3>Model Name</h3>
                <p>Choose an noun to describe the toy model</p>
                <input type = "text" name = "model" placeholder = "Teddy Bear"> <br>
                <br><br>
                <h3>Model Material</h3>
                <input type="radio" id="plush" name="material" value="Plush">
                <label for="plush">Plush</label> <br>
                <input type="radio" id="plastic" name="material" value="Plastic">
                <label for="plastic">Plastic</label> <br>
                <br><br>
                <h3>Probability</h3>
                <p>Choose an noun to describe the toy model</p>
                <br><br>
                <button type = "submit" name = "submit">SAVE</button>
            </form>
        </section>
    </div>
</body>
</html>