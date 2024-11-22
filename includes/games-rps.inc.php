<?php 
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include "../classes/dbh.classes.php";
    include "../classes/inventory.classes.php";
    include "../classes/inventory-view.classes.php";
    include "../classes/inventory-contr.classes.php";

    $uid = $_SESSION["userid"];
    $score = (int)htmlspecialchars($_POST["score"], ENT_QUOTES, 'UTF-8');
    $inventoryView = new InventoryView();
    $inventoryContr = new InventoryContr($uid);

    $currBalance = (int)$inventoryView->fetchBalance($uid);

    $newBalance = $currBalance + $score;
    $inventoryContr->editBalance($newBalance);
    header("location: ../carnival.php");
}