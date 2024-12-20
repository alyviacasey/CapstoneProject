<?php
    session_start();
?>
<?php if(!isset($_SESSION["userid"])) { header("location: ../index.php"); } ?>
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
                    <h3>Balance: <?php echo $inventoryView->fetchBalance($_SESSION["userid"]); ?> coins</h3> <br>
                </div>
            </div>
            <div class = "boxes">
                <?php $inventory = $inventoryView->fetchBoxes($_SESSION["userid"]); ?>

                    <?php foreach($inventory as $box): ?>
                        <div class = "item-box">
                        <img src = "<?php $boxView->fetchImg($box['boxmodel_id']); ?>" alt = "box image">
                        <h4><?= $box['name']; ?></h4>
                        <p><?php echo $box['price'] . " coins";?></p>
                        <form action = "includes/inventory.inc.php" method = "post">
                            <input type = "hidden" name = "boxid" value = "<?= $box['box_id']; ?>">
                            <input type = "hidden" name = "boxmodelid" value = "<?= $box['boxmodel_id']; ?>">
                            <button type = "submit" name = "usebox">OPEN</button> <button type = "submit" name = "sellbox">SELL</button>
                        </form>
                        </div>
                    <?php endforeach ?>     
            </div>
        </section>
    </div>
</body>
</html>