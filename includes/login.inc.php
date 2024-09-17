<?php
// Check if the file was accessed with the submit button, security measure
if(isset($_POST["submit"])){
    // Set variables and grab data
    $uid = $_POST["uid"]; 
    $pwd = $_POST["pwd"];

    // Instantiate LoginContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    $login = new LoginContr($uid, $pwd);

    // Running error handlers and user signup

    $login->loginUser();

    // Going back to front page
    header("location: ../index.php?error=none");
}
?>