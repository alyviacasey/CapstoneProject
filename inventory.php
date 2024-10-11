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

    $inventory = new InventoryView();
    ?>

    <div class = "wrapper">
        <section class = "inventory">
            <div class = "inventory-info">
                <div class = "balance">
                    <h3>Balance:</h3> <?php $inventory->fetchBalance($_SESSION["userid"]); ?>
                    </p>
                    <br><br>
                </div>
            </div>
            <div class = "boxes">
                <?php $boxes = $inventory->fetchBoxes($_SESSION["userid"]); ?>
                <table>
                    <tr>
                      <th>Box ID</th>
                      <th>Name</th>
                      <th>Price</th>
                    </tr>

                    <?php foreach($boxes as $row): ?>
                        <tr>
                        <td><?= htmlspecialchars($row['box_id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['price']) ?></td>
                    </tr>
                    <?php endforeach ?>
                </table>      
            </div>
        </section>
    </div>
</body>
</html>