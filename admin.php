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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/stars.js" defer></script>
</head>

<body>
    <?php include_once "header.php"; 
    
    include "classes/dbh.classes.php";
    include "classes/model.classes.php";
    include "classes/model-view.classes.php";
    include "classes/box.classes.php";
    include "classes/box-view.classes.php";

    $fullInventory = new BoxView();
    $fullCollection= new ModelView();

    $boxes = $fullInventory->fetchAllBoxModels(); 
    $toys = $fullCollection->fetchAllModels();
    ?>

    <div class = "wrapper">
        <?php
            if($_SESSION["admin"] == 1)
            {
        ?>
        <div class = "admin">
            <h2>ADMIN PANEL</h2>
            <br>
            <section class = "admin-forms">
                <div class = "admin-form">
                    <h3>Toy Model Creator</h3>
                    <br>
                    <form action = "includes/admin-model.inc.php" method = "post">
                        <h4>Theme</h4>
                        <p>Choose an adjective to describe the toy model</p>
                        <input type = "text" name = "theme" rows="10" cols="30" placeholder = "Birthday"> <br>
                        <br>
                        <h4>Model Name</h4>
                        <p>Choose an noun to describe the toy model</p>
                        <input type = "text" name = "model" placeholder = "Bear"> <br>
                        <br>
                        <h4>Model Material</h4>
                        <input type="radio" id="plush" name="material" value="Plush">
                        <label for="plush">Plush</label> &nbsp; &nbsp;
                        <input type="radio" id="plastic" name="material" value="Plastic">
                        <label for="plastic">Plastic</label> <br>
                        <br>
                        <h4>Rarity</h4>
                        <p>Select a rarity for this pet</p>
                        <input type="hidden" id="rarity" name="rarity" value="0">
                        <div class = "stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <br>
                        <button type = "submit" name = "create">SUBMIT</button>
                    </form>
                </div>
                <div class = "admin-form">
                    <h3>GiftBox Model Creator</h3>
                    <br>
                    <form action = "includes/admin-box.inc.php" method = "post">
                        <h4>Name</h4>
                        <p>Choose an name/theme for your box.</p>
                        <input type = "text" name = "theme" rows="10" cols="30" placeholder = "Birthday"> Box<br>
                        <br>
                        <h4>Price</h4>
                        <p>Enter an integer for how many coins the box will cost.</p>
                        <input type = "text" name = "price" placeholder = "100"> <br>
                        <br>
                        <button type = "submit" name = "create">SUBMIT</button>
                    </form>
                </div>
            </section>

            <br> <br>
            <section class = "admin-tables">
                <h3>GiftBox Models</h3>
                <br>
                <div class = "box-table">
                    <table>
                        <tr>
                        <th>Model ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Contents</th>
                        <th> </th>
                        <th> </th>
                        </tr>

                        <?php foreach($boxes as $row): ?>
                            <tr>
                            <td><?= htmlspecialchars($row['model_id']) ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['price']) ?></td>
                            <td style = "width: 10em;">
                                <?php $contents = $fullInventory->fetchContents($row['model_id']); 
                                
                                foreach($contents as $row2): ?>
                                <?= htmlspecialchars($row2['theme']) . ' ' . htmlspecialchars($row2["model_name"]) . ', ' ?>
                                <?php endforeach ?> 
                                <br> <br>
                                <form action = "includes/admin-contents.inc.php" method = "post">
                                    <select id="contents" name="contents">
                                        <?php foreach ($toys as $row2): ?>
                                            <option value="<?=htmlspecialchars($row2['model_id'])?>"><?= htmlspecialchars($row2['theme']) . ' ' . htmlspecialchars($row2['model_name']) ?></option>
                                            <?php endforeach ?>
                                    </select> 
                                    <input type = "hidden" name = "boxid" value = "<?= $row['model_id'] ?>">
                                    <button type = "submit" name = "set">ADD / REMOVE</button>
                                </form>
                            </td>
                            <td>
                                <form action = "includes/admin-box.inc.php" method = "post" enctype="multipart/form-data">
                                    <input type = "hidden" name = "boxid" value = "<?= $row['model_id'] ?>"> 
                                    <label for = "file" class = "custom-file">
                                        <input type="file" name="boxfile<?= $row['model_id'] ?>">
                                        <i class="fa fa-cloud-upload"></i> Upload Image
                                    </label> <br> <br>
                                    <button type = "submit" name = "boximage">SAVE</button>
                                </form>
                            </td>
                            <td> 
                                <form action = "includes/admin-box.inc.php" method = "post">
                                    <input type = "hidden" name = "boxids" value = "<?= $row['model_id'] ?>"> <br>
                                    <button type = "submit" name = "delete">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </table>      
                </div>
                <br> <br>
                <h3>Toy Models</h3>
                <br>
                <div class = "toy-table">
                    <table>
                        <tr>
                        <th>Model ID</th>
                        <th>Name</th>
                        <th>Material</th>
                        <th>Rarity</th>
                        <th> </th>
                        <th> </th>
                        </tr>

                        <?php foreach ($toys as $row): ?>
                            <tr>
                            <td><?= htmlspecialchars($row['model_id']) ?></td>
                            <td><?= htmlspecialchars($row['theme']) . ' ' . htmlspecialchars($row['model_name']) ?></td>
                            <td><?= htmlspecialchars($row['material'])?></td>
                            <td><?= htmlspecialchars($row['rarity'])?></td>
                            <td>
                                <form action = "includes/admin-model.inc.php" method = "post" enctype="multipart/form-data">
                                    <input type = "hidden" name = "toyid" value = "<?= $row['model_id'] ?>"> 
                                    <label for = "file" class = "custom-file">
                                        <input type="file" name="toyfile<?= $row['model_id'] ?>">
                                        <i class="fa fa-cloud-upload"></i> Upload Image
                                    </label> <br> <br>
                                    <button type = "submit" name = "toyimage">SAVE</button>
                                </form>
                            </td>
                            <td> 
                                <form action = "includes/admin-model.inc.php" method = "post">
                                    <input type = "hidden" name = "toyid" value = "<?= $row['model_id'] ?>"> <br>
                                    <button type = "submit" name = "delete">DELETE</button>
                                </form>
                            </td>
                            </tr>
                        <?php endforeach ?>
                    </table>      
                </div>
            </section>
        </div>

        <!-- If user is not an admin... -->

        <?php
                }
                else
                {
        ?>

        <h2>You do not have permission to view this page!</h2>

        <?php } ?>
    </div>
</body>
</html>