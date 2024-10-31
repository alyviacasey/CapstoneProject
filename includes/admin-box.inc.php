<?php

// If the file was accessed with the submit button...
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // SET VARIABLES from form input
    

    // INSTANTIATE CONTROLLER 

    include "../classes/dbh.classes.php";
    include "../classes/box.classes.php";
    include "../classes/box-contr.classes.php";
    include "../classes/box-view.classes.php";


    if(isset($_POST['create'])) {

        $name = htmlspecialchars($_POST["theme"], ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars($_POST["price"], ENT_QUOTES, 'UTF-8');

        $create = new BoxContr($name, $price);

        // Running error handlers and user signup

        $create->createModel($name, $price);

        //$mid = $create->fetchUserID(($usn));

        // Going back to front page
        header("location: ../admin.php?error=none");
    }
    else if(isset($_POST['delete'])) {
        $boxID = htmlspecialchars($_POST["boxid"], ENT_QUOTES, 'UTF-8');

        $delete = new BoxView();
        $delete->deleteBoxModel($boxID);
    }
}