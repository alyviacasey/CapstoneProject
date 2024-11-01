<?php

// If the file was accessed with the submit button...
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // SET VARIABLES from form input
    

    // INCLUDE CLASS FILES

    include "../classes/dbh.classes.php";
    include "../classes/box.classes.php";
    include "../classes/box-contr.classes.php";
    include "../classes/box-view.classes.php";


    if(isset($_POST['create'])) {

        $name = htmlspecialchars($_POST["theme"], ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars($_POST["price"], ENT_QUOTES, 'UTF-8');
        if (!is_numeric($price) || $price < 0) {
            header("location: ../admin.php?error=invalidprice");
            exit();
        }

        $create = new BoxContr($name, $price);

        // Create new box model

        $create->createModel();

        //$mid = $create->fetchUserID(($usn));

        // Going back to front page
        header("location: ../admin.php?error=none");
    }
    else if(isset($_POST['delete'])) {
        $boxID = htmlspecialchars($_POST["boxid"], ENT_QUOTES, 'UTF-8');

        $delete = new BoxView();
        $delete->deleteBoxModel($boxID);

        header("location: ../admin.php?error=none");
    }
    else if(isset($_POST['boximage'])) {

        $boxID = $_POST["boxid"];
        $file = $_FILES['boxfile'.$boxID];

        if ($file['error'] === UPLOAD_ERR_OK) {
            $edit = new BoxView();
            $edit->editImg($boxID, $file);
            header("location: ../admin.php?error=none");
        } else {
            // Handle file upload error
            header("location: ../admin.php?error=upload_failed");
        }
    }
}