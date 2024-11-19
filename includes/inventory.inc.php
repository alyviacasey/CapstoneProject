<?php

session_start();

// If the file was accessed with the submit button...
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // SET VARIABLES from form input
    

    // INCLUDE CLASS FILES

    include "../classes/dbh.classes.php";
    include "../classes/model.classes.php";
    include "../classes/model-view.classes.php";
    include "../classes/inventory.classes.php";
    include "../classes/inventory-contr.classes.php";
    include "../classes/collection.classes.php";
    include "../classes/collection-contr.classes.php";


    if(isset($_POST['usebox'])) {
        $boxID = htmlspecialchars($_POST["boxid"], ENT_QUOTES, 'UTF-8');
        $modelID = htmlspecialchars($_POST["boxmodelid"], ENT_QUOTES, 'UTF-8');

        $inventoryContr = new InventoryContr($_SESSION["userid"]);
        $collectionContr = new CollectionContr($_SESSION["userid"]);
        $modelView = new ModelView();

        // GET MODEL

        $prize = $inventoryContr->rollBox($boxID);
        $prizeModel = $prize["model_id"];

        $toy = $modelView->fetchModel($prizeModel);
        $name = $toy[0]["theme"] . " " . $toy[0]["model_name"];

        // ADD TO COLLECTION

        $collectionContr->getToy($prizeModel, $name);

        // DELETE BOX

        //$inventoryContr ->deleteBox($boxID);

        header("location: ../inventory.php?error=none");
    }
}