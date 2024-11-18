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
    include "classes/box.classes.php";
    include "classes/box-view.classes.php";
    include "classes/inventory.classes.php";
    include "classes/inventory-view.classes.php";

    $inventoryView = new InventoryView();
    $boxView = new BoxView();
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
                <?php $inventory = $inventoryView->fetchBoxes($_SESSION["userid"]); ?>

                    <?php foreach($inventory as $box): ?>
                        <div class = "store-box">
                        <img src = "<?php $boxView->fetchImg($box['boxmodel_id']); ?>" alt = "box image" style = "width: 100px; height:100px;">
                        <h4><?= $box['name']; ?></h4>
                        <p><?php echo $box['price']; ?></p>
                        <form action = "includes/inventory.inc.php" method = "post">
                            <input type = "hidden" name = "boxid" value = "<?= $box['box_id']; ?>">
                            <input type = "hidden" name = "boxmodelid" value = "<?= $box['boxmodel_id']; ?>">
                            <button type = "submit" name = "usebox">OPEN</button>
                        </form>
                        </div>
                    </tr>
                    <?php endforeach ?>
                </table>      
            </div>
        </section>
    </div>
</body>
</html>