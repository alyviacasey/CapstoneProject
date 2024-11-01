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
        <h2>Store</h2> <br>
        <section class = "store">
        <?php foreach($store as $box): ?>
            <div class = "store-box">
                <img src = "<?= $allboxes->fetchImg($box['model_id']) ?>" alt = "box image">
                <h4><?= $box['name']; ?></h4>
                <p><?php echo $box['price']; ?></p>
                <form action = "includes/store.inc.php" method = "post">
                    <input type = "hidden" name = "boxid" value = "<?= $box['model_id']; ?>">
                    <input type = "hidden" name = "price" value = "<?= $box['price']; ?>">
                    <button type = "submit" name = "purchase">PURCHASE</button>
                </form>
            </div>
        <?php endforeach; ?>
        </section> <br> <br>
        <?php
            if($_SESSION["admin"] == 1)
            {
        ?>
            <h2>Admin</h2> <br>
            <form action = "includes/admin-store.inc.php" method = "post">
                <select id="boxid" name="boxid">
                    <?php foreach ($allBoxes as $row): ?>
                            <option value="<?=htmlspecialchars($row['model_id'])?>"><?= htmlspecialchars($row['name']) ?></option>
                            <?php endforeach ?>
                    </select> 
                    <button type = "submit" name = "set">ADD / REMOVE</button>
                    </form>
        <?php } ?>
    </div>
</body>
</html>