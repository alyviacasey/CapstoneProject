<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include "../classes/dbh.classes.php";
    include "../classes/inventory.classes.php";
    include "../classes/inventory-view.classes.php";
    include "../classes/inventory-contr.classes.php";

    $score = htmlspecialchars($_POST["score"], ENT_QUOTES, 'UTF-8');

    if(isset($_POST['submit-score'])) {
        error_log($score);
    }
}