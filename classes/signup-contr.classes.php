<?php
// SIGNUP CONTROLLER
// INPUT - Handles interaction from the user and interacts with model objects

class SignupContr extends Signup {

    // PROPERTIES

    private $usn;
    private $pwd;
    private $pwdRepeat;
    private $email;

    // DEFINE CONSTRUCTOR

    public function __construct($usn, $pwd, $pwdRepeat, $email) {
        $this->usn = $usn;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }



    // METHODS

    // SIGN UP USER
    // Create new user 

    public function signupUser() {
        // ERROR HANDLING
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        if($this->invalidUsn() == false) {
            header("location: ../index.php?error=username");
            exit();
        }

        if($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }

        if($this->pwdMatch() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }

        if($this->uidTakenCheck() == false) {
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        // NO ERRORS
        // Create new user
        $this->setUser($this->usn, $this->pwd, $this->email);
    }



    // FETCH USER ID
    // Get user id #

    public function fetchUserID($usn){
        $uid= $this->getUserId($usn);
        return $uid[0]["user_id"];
    }



    // ERROR HANDLING METHODS

    // EMPTY INPUT
    // Check for empty / blank inputs in form

    private function emptyInput() {
        $result = false;
        if(empty($this->usn) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        }
        else { 
            $result = true;
        }
        return $result;
    }



    // INVALID ID
    // Checks username using regex

    private function invalidUsn() {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->usn)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }



    // INVALID EMAIL
    // Check if email is valid

    private function invalidEmail() {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }



    // PASSWORD MATCH
    // Check that passwords match

    private function pwdMatch() {
        $result = false;
        if($this->pwd !== $this->pwdRepeat)
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }



    // USER TAKEN
    // Check if username / email exists already

    private function uidTakenCheck() {
        $result = false;
        if (!$this->checkUser($this->usn, $this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}
