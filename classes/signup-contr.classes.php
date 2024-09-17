<?php
// Change database

class SignupContr extends Signup {

    // Define properties inside class
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    // Constructor
    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser() {
        // Run error handlers
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        if($this->invalidUid() == false) {
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

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    // Error handlers

    // Check for empty / blank inputs
    private function emptyInput() {
        $result = false;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        }
        else { 
            $result = true;
        }
        return $result;
    }

    // Checks username using regex
    private function invalidUid() {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

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

    // Check if username / email exists already
    private function uidTakenCheck() {
        $result = false;
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}
?>