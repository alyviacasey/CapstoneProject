<?php

// If the file was accessed with the submit button...
if($_SERVER["REQUEST_METHOD"] == "POST"){


    // INSTANTIATE MODEL CONTROLLER ( create new model )

    include "../classes/dbh.classes.php";
    include "../classes/model.classes.php";
    include "../classes/model-contr.classes.php";
    include "../classes/model-view.classes.php";


    if(isset($_POST['create'])) {
        // SET VARIABLES from form input
        $theme = htmlspecialchars($_POST["theme"], ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($_POST["model"], ENT_QUOTES, 'UTF-8');
        $material = htmlspecialchars($_POST["material"], ENT_QUOTES, 'UTF-8');
        $rarity = htmlspecialchars($_POST["rarity"], ENT_QUOTES, 'UTF-8');

        $create = new ModelContr($theme, $name, $material, $rarity);

        // Running error handlers and user signup

        $create->createModel();

        //$mid = $create->fetchUserID(($usn));

        // Going back to front page
        header("location: ../admin.php?error=none");
    }
    else if(isset($_POST['delete'])) {
        $toyID = $_POST["toyid"];

        $delete = new ModelView();
        $delete->deleteModel($toyID);

        header("location: ../admin.php?error=none");
    }
    else if(isset($_POST['toyimage'])) {

        $toyID = $_POST["toyid"];
        $file = $_FILES['toyfile'.$toyID];

        // Check for file upload errors
        if ($file['error'] === UPLOAD_ERR_OK) {
            $edit = new ModelView();
            $edit->editImg($toyID, $file);
            header("location: ../admin.php?error=none");
        } else {
            // Handle file upload error
            header("location: ../admin.php?error=upload_failed".$file['error']);
        }
    }
}
