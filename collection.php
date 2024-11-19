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
    include "classes/collection.classes.php";
    include "classes/collection-view.classes.php";

    $collectionView = new CollectionView();
    $modelView = new ModelView();
    ?>

    <div class = "wrapper">
        <section class = "collection">
            <div class = "toys">
                <?php $collection = $collectionView->fetchToys($_SESSION["userid"]); ?>

                <?php foreach($collection as $toy): ?>
                <div class = "store-box">
                    <img src = "<?php $modelView->fetchImg($toy['model_id']); ?>" alt = "toy image" style = "width: 100px; height:100px;">
                    <h4><?= $toy['toy_name']; ?></h4>
                    ID #<?= $row['toy_id'] ?> <br>
                    <?= $row['theme'] . ' ' . $row['model_name']?> <br>
                    BIRTHDAY: <?= $row['adoption_date'] ?>
                </tr>
                <?php endforeach ?>
                </table>      
            </div>
        </section>
    </div>
</body>
</html>