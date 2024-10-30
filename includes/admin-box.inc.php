<?php

// If the file was accessed with the submit button...
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // SET VARIABLES from form input
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $price = htmlspecialchars($_POST["price"], ENT_QUOTES, 'UTF-8');
    

    // INSTANTIATE MODEL CONTROLLER ( create new model )

    include "../classes/dbh.classes.php";
    include "../classes/model.classes.php";
    include "../classes/model-contr.classes.php";

    $create = new ModelContr($theme, $name, $material, $rarity);

    // Running error handlers and user signup

    $create->createModel();

    //$mid = $create->fetchUserID(($usn));

    // Going back to front page
    header("location: ../index.php?error=none");
}