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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include_once "header.php"; 
    
    include "classes/dbh.classes.php";
    include "classes/profile.classes.php";
    include "classes/profile-view.classes.php";

    $profile = new ProfileView();
    ?>

    <div class = "wrapper">
        <section class = "profile-settings">
            <h2>PROFILE SETTINGS</h2>
            <br><br>
            <form action = "includes/profile.inc.php" method = "post"  enctype="multipart/form-data">
                <h3>Icon</h3>
                <label for = "file" class = "custom-file">
                    <input type="file" name="file" id="file">
                    <i class="fa fa-cloud-upload"></i> Upload Image
                </label> 
                <br><br>
                <h3>About</h3>
                <textarea name = "about" rows="10" cols="50" placeholder = "Tell us about yourself!"> <?php $profile->fetchAbout($_SESSION["userid"]);?> </textarea>
                <br><br>
                <h3>Introduction</h3>
                <input type = "text" name = "introtitle" placeholder = "Hello, my name is..." value = "<?php $profile->fetchIntroTitle($_SESSION["userid"]); ?>"> <br>
                <textarea name="introtext" rows="10" cols="50" placeholder="Type an introduction!"> <?php $profile->fetchIntroText($_SESSION["userid"]); ?></textarea>
                <br>
                <button type = "submit" name = "submit">SAVE</button>
            </form>
        </section>
    </div>
</body>
</html>