<?php

class LoginContr extends Login {

// Define properties inside class
private $uid;
private $pwd;

// Constructor
public function __construct($uid, $pwd) {
    $this->uid = $uid;
    $this->pwd = $pwd;
}

public function loginUser() {
    // Run error handlers
    if($this->emptyInput() == false) {
        header("location: ../index.php?error=emptyInput");
        exit();
    }

    $this->getUser($this->uid, $this->pwd);
}

// Error handlers

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
?>