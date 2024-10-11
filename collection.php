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

    $collection = new CollectionView();
    ?>

    <div class = "wrapper">
        <section class = "collection">
            <div class = "toys">
                <?php $toys = $collection->fetchToys($_SESSION["userid"]); ?>
                <table>
                    <tr>
                      <th>Toy ID</th>
                      <th>Toy Name</th>
                      <th>Model</th>
                      <th>Adopted</th>
                    </tr>

                    <?php foreach($toys as $row): ?>
                        <tr>
                        <td><?= $row['toy_id'] ?></td>
                        <td><?= $row['toy_name'] ?></td>
                        <td><?= $row['theme'] . ' ' . $row['model_name']?></td>
                        <td><?= $row['adoption_date'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </table>      
            </div>
        </section>
    </div>
</body>
</html>