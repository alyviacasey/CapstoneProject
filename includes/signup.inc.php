<?php

// If the file was accessed with the submit button...
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // SET VARIABLES from form input
    $usn = htmlspecialchars($_POST["usn"], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UTF-8');
    $pwdRepeat = htmlspecialchars($_POST["pwdrepeat"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');

    // INSTANTIATE SIGNUP CONTROLLER ( create new user )

    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    $signup = new SignupContr($usn, $pwd, $pwdRepeat, $email);

    // Running error handlers and user signup

    $signup->signupUser();

    $uid = $signup->fetchUserID(($usn));

    // INSTANTIATE ( create new profile )

    include "../classes/profileinfo.classes.php";
    include "../classes/profileinfo-contr.classes.php";

    $profileInfo = new ProfileContr($uid, $usn);
    $profileInfo->defaultProfileInfo();

    // Going back to front page
    header("location: ../index.php?error=none");
}
