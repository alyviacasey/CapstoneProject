<?php
// LOGIN CONTROLLER
// INPUT - Handles interaction from the user and interacts with model objects

class LoginContr extends Login {

// PROPERTIES 

private $uid;
private $pwd;

// DEFINE CONSTRUCTOR

public function __construct($uid, $pwd) {
    $this->uid = $uid;
    $this->pwd = $pwd;
}



// METHODS

// LOGIN USER
// Set session variables for user

public function loginUser() {
    // ERROR HANDLING

    // If form input is empty... ERROR
    if($this->emptyInput() == false) {
        header("location: ../index.php?error=emptyInput");
        exit();
    }

    // NO ERRORS

    // Sets session variables for user
    $this->getUser($this->uid, $this->pwd);
}



// ERROR HANDLING METHODS

// EMPTY INPUT
// Check for empty / blank inputs

private function emptyInput() {
    $result = false;
    if(empty($this->uid) || empty($this->pwd)) {
        $result = false;
    }
    else { 
        $result = true;
    }
    return $result;
}

}
