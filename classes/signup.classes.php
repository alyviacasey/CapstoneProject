<?php 
// SIGNUP MODEL
// BRAIN - makes database changes, queries database. Defines data logic and stores and retrieves data from database

class Signup extends Dbh {

    // METHODS

    // SET USER
    // Creates new user row of data

    protected function setUser($uid, $pwd, $email) {
        // PREPARE SQL STATEMENT
        // Insert new data into Users table
        $sql = 'INSERT INTO Users (username, password, email, registration) VALUES (?, ?, ?, ?);';
        $stmt = $this->connect()->prepare($sql);

        // Hash password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        // Set date to update registration date
        date_default_timezone_set('EST');
        $today = date('Y-m-d');

        // ERROR HANDLING

        // If statement fails to execute... ERROR
        if(!$stmt->execute(array($uid, $hashedPwd, $email, $today))) { 
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }   

        $stmt = null;
    }


    
    // CHECK USER
    // If username or email already exists in database... return false

    protected function checkUser($uid, $email) {
        // PREPARE SQL
        // Get user_id
        $sql = 'SELECT user_id FROM Users WHERE username = ? OR email = ?;';
        $stmt = $this->connect()->prepare($sql);

        // ERROR HANDLING

        // If statement fails to execute... ERROR
        if(!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        // NO ERRORS

        // Create variable
        $resultCheck = true;

        // Is there no matches? Query should be empty
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}
