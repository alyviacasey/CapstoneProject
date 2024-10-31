<?php

// If the file was accessed with the submit button...
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // SET VARIABLES from form input
    $boxID = htmlspecialchars($_POST["boxid"], ENT_QUOTES, 'UTF-8');
    $toyID = htmlspecialchars($_POST["contents"], ENT_QUOTES, 'UTF-8');
    
    // INSTANTIATE MODEL CONTROLLER ( create new model )

    include "../classes/dbh.classes.php";
    include "../classes/box.classes.php";
    include "../classes/contents-contr.classes.php";

    $contents = new ContentContr($boxID, $toyID);


    /*if(isset($_POST['add'])) {
        $contents->addContents();

    }
    else if(isset($_POST['remove'])) {
        $contents->removeContents();
    }*/


    if($contents->matchContents() == false){
        $contents->addContents();
    }
    else if($contents->matchContents() == true){
        $contents->removeContents();
    }

    // Going back to front page
    header("location: ../admin.php?error=none");
}