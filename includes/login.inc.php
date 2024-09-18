<?php

// Check if the file was accessed with the submit button, security measure
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Set parameter variables
    $usn = htmlspecialchars($_POST["usn"], ENT_QUOTES, 'UTF-8'); 
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UTF-8'); 

    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    // INSTANTIATE ( set session variables )
    $login = new LoginContr($usn, $pwd);

    // Running error handlers and user signup

    $login->loginUser();

    // Going back to front page
    header("location: ../index.php?error=none");
}
