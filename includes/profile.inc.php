<?php

session_start();

// If the file was accessed with the submit button...
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // VARIABLES
    $uid = $_SESSION["userid"];
    $usn = $_SESSION["username"];
    $about = htmlspecialchars($_POST["about"], ENT_QUOTES, "UTF-8");
    $introTitle = htmlspecialchars($_POST["introtitle"], ENT_QUOTES, "UTF-8");
    $introText = htmlspecialchars($_POST["introtext"], ENT_QUOTES, "UTF-8");

    $file = $_FILES['file'];


    // GRAB DATABASE CONNECTION

    include "../classes/dbh.classes.php";
    include "../classes/profile.classes.php";
    include "../classes/profile-contr.classes.php";

    $profile = new ProfileContr($uid, $usn);

    // UPDATE INFO

    $profile->editProfile($about, $introTitle, $introText);

    // UPLOAD ICON

    if($file['size'] !== 0){
        $profile->editIcon($file);
    }

    // SEND BACK TO PROFILE

    header("location: ../profile.php?error=none");
}