<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toybox</title>
    <link rel="stylesheet" href="/css/style.css"> 
    <link rel="stylesheet" href="/css/reset.css"> 
</head>

<body>
    <?php include_once "header.php"; 
    
    include "classes/dbh.classes.php";
    include "classes/inventory.classes.php";
    include "classes/inventory-view.classes.php";
    
    $inventoryView = new InventoryView();?>

    <div class = "wrapper">
        <h3>Carnival</h3> <h3 style="float:right;">Balance: <?php echo $inventoryView->fetchBalance($_SESSION["userid"]); ?></h3>
        <iframe src="games/rps.php" width="100%" height="600px" frameborder="0"></iframe>
    </div>
</body>
</html>