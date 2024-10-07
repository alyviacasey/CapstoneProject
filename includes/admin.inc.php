<?php

// If the file was accessed with the submit button...
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // SET VARIABLES from form input
    $theme = htmlspecialchars($_POST["theme"], ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $material = htmlspecialchars($_POST["material"], ENT_QUOTES, 'UTF-8');

    // INSTANTIATE MODEL CONTROLLER ( create new model )

    include "../classes/dbh.classes.php";
    include "../classes/model.classes.php";
    include "../classes/model-contr.classes.php";

    $signup = new ModelContr($theme, $name, $material);

    // Running error handlers and user signup

    $create->createModel();

    //$mid = $create->fetchUserID(($usn));

    // Going back to front page
    header("location: ../index.php?error=none");
}
