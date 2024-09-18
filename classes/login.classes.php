<?php 
// LOGIN MODEL PAGE
// BRAIN - makes database changes, queries database. Defines data logic and stores and retrieves data from database

class Login extends Dbh {

    // METHODS

    // GET USER
    // Sets session variables for user

    protected function getUser($usn, $pwd) {
        // PREPARE SQL STATEMENT
        // Get password from user
        $sql = 'SELECT password FROM Users WHERE username = ? OR email = ?;';
        $stmt = $this->connect()->prepare($sql);

        // ERROR HANDLING

        // If statement fails... ERROR
        if(!$stmt->execute(array($usn, $usn))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }       

        // If statement returns no data... ERROR
        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        // Fetch all the data from the query as an associative array 
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["password"]);

        // If password does not match hashed password... ERROR
        if($checkPwd == false){
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        // If password matches...
        else if ($checkPwd == true) {
            // PREPARE SQL STATEMENTS
            // Select all data from user
            $sql = 'SELECT * FROM Users WHERE username = ? OR email = ? AND password = ?;';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails... ERROR
            if(!$stmt->execute(array($usn, $usn, $pwdHashed[0]["password"]))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }  

            // If statement returns no data... ERROR
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            // NO ERRORS

            // Fetch all the data from the query as an associative array
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Update last login date
            date_default_timezone_set('EST');
            $today = date('Y-m-d');
            $sql = 'UPDATE Users SET last_login = ? WHERE username = ? OR email = ?;';
            $lastLogin = $this->connect()->prepare($sql); 
            $lastLogin->execute(array($today, $usn, $usn)); 
            $lastLogin = null;

            // Set session variables
            session_start();
            
            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["username"] = $user[0]["username"];

            $stmt = null;
        }
    }
}