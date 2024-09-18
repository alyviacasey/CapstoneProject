<?php 
// Query database

class Login extends Dbh {

    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare('SELECT password FROM Users WHERE username = ? OR email = ?;');

        // Check if statement failed, returns as false
        if(!$stmt->execute(array($uid, $uid))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }       

        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["password"]);

        if($checkPwd == false){
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        else if ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM Users WHERE username = ? OR email = ? AND password = ?;');

            if(!$stmt->execute(array($uid, $uid, $pwdHashed[0]["password"]))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }  

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Update last login date
            date_default_timezone_set('EST');
            $today = date('Y-m-d');
            $sql = 'UPDATE Users SET last_login = ? WHERE username = ? OR email = ?;';
            $update = $this->connect()->prepare($sql); 
            $update->execute(array($today, $uid, $uid)); 
            $update = null;

            // Set session variables
            session_start();
            
            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["username"] = $user[0]["username"];

            $stmt = null;
        }
    }
}

?>