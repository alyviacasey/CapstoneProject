<?php 
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include "../classes/dbh.classes.php";
    include "../classes/inventory.classes.php";
    include "../classes/inventory-view.classes.php";
    include "../classes/inventory-contr.classes.php";

    $score = htmlspecialchars($_POST["score"], ENT_QUOTES, 'UTF-8');
    $inventoryView = new InventoryView();
    $inventoryContr = new InventoryContr($_SESSION["userid"]);

    $currBalance = $intentoryView->fetchBalance($_SESSION["userid"]);

    if(isset($_POST['submit-score'])) {
        $newBalance = $currBalance + $score;
        $inventoryContr->editBalance($newBalance);
    }
}