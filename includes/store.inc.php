<?php

session_start();

// If the file was accessed with the submit button...
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // SET VARIABLES from form input
    

    // INCLUDE CLASS FILES

    include "../classes/dbh.classes.php";
    include "../classes/box.classes.php";
    include "../classes/box-contr.classes.php";
    include "../classes/box-view.classes.php";
    include "../classes/inventory.classes.php";
    include "../classes/inventory-contr.classes.php";


    if(isset($_POST['purchase'])) {
        $boxID = htmlspecialchars($_POST["boxid"], ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars($_POST["price"], ENT_QUOTES, 'UTF-8');

        $purchase = new InventoryContr($_SESSION["userid"]);

        $purchase->purchaseBox($boxID, $price);
    }
}