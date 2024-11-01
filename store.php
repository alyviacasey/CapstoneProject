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

    $boxView = new BoxView();

    $allBoxes = $boxView->fetchAllBoxModels(); 
    $store = $boxView->fetchStore();
    ?>

    <div class = "wrapper">
        <h3>Store</h3>
        <section class = "store">
        <?php foreach($store as $box): ?>
            <div class = "store-box">
                <!-- <img src = "<?php echo $box['boximg']; ?>" alt = "box image"> -->
                <h4><?= $box['model_name']; ?></h4>
                <p><?php echo $box['price']; ?></p>
                <form action = "includes/store.inc.php" method = "post">
                    <input type = "hidden" name = "boxid" value = "<?= $box['model_id']; ?>">
                    <input type = "hidden" name = "price" value = "<?= $box['price']; ?>">
                    <button type = "submit" name = "purchase">PURCHASE</button>
                </form>
            </div>
        <?php endforeach; ?>
        </section>
    </div>
</body>
</html>