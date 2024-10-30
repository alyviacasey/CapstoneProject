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

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    // GRAB DATABASE CONNECTION

    include "../classes/dbh.classes.php";
    include "../classes/profile.classes.php";
    include "../classes/profile-contr.classes.php";

    $profile = new ProfileContr($uid, $usn);

    // UPDATE INFO

    $profile->editProfile($about, $introTitle, $introText);

    // UPLOAD ICON

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }

    // SEND BACK TO PROFILE

    header("location: ../profile.php?error=none");
}