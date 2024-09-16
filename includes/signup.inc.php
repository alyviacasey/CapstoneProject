<?php
// Check if the file was accessed with the submit button, security measure
if(isset($_POST["submit"])){
    // Set variables and grab data
    $uid = $_POST["uid"]; 
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    // Running error handlers and user signup

    $signup->signupUser();

    // Going back to front page
    header("location: ../index.php?error=none");
}
?>