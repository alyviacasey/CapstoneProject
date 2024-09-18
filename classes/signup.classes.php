<?php 
// Query database

class Signup extends Dbh {

    // Sign up user
    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO Users (username, password, email, registration) VALUES (?, ?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        date_default_timezone_set('UTC');
        $today = date('Y-m-d');

        // Check if statement failed, returns as false
        if(!$stmt->execute(array($uid, $hashedPwd, $email, $today))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }       

        $stmt = null;
    }

    // Check if username or email already exists in database
    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT user_id FROM Users WHERE username = ? OR email = ?;');

        // Check if statement failed, returns as false
        if(!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck = true;

        // Checks how many rows returned
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}

?>