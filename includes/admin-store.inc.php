<?php

// If the file was accessed with the submit button...
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // SET VARIABLES from form input
    $boxID = htmlspecialchars($_POST["boxid"], ENT_QUOTES, 'UTF-8');
    
    // INSTANTIATE MODEL CONTROLLER ( create new model )

    include "../classes/dbh.classes.php";
    include "../classes/box.classes.php";
    include "../classes/box-view.classes.php";

    $box = new BoxView();


    if($box->inStore($boxID) == false){
        $box->addToStore($boxID);
    }
    else if($box->inStore($boxID) == true){
        $box->removeFromStore($boxID);
    }

    // Going back to front page
    header("location: ../store.php?error=none");
}