<?php
    // PROFILE MODEL
    // BRAIN - makes database changes, queries database. Defines data logic and stores and retrieves data from database

    class Profile extends Dbh {

        // METHODS

        // GET PROFILE INFO
        // Returns associative array of all profile data for user

        protected function getProfile($uid) {
            // PREPARE SQL STATEMENT
            // Select all user profile data
            $sql = 'SELECT * FROM Profiles WHERE user_id = ?;';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($uid))) {
                $stmt = null;
                header("location: ../profile.php?error=stmtfailed");
                exit();
            }

            // If statement returns no data... ERROR
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../profile.php?error=profilenotfound");
                exit();
            }

            // NO ERRORS

            // Fetch all the data from the query as an associative array
            $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $profileData;
        }



        // UPDATE PROFILE
        // Update profile data 

        protected function updateProfile($about, $introTitle, $introText, $uid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'UPDATE Profiles SET about = ?, intro_title = ?, intro_text = ? WHERE user_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($about, $introTitle, $introText, $uid))) {
                $stmt = null;
                header("location: ../profile.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }



        // SET PROFILE
        // Update profile data 

        protected function setProfile($about, $introTitle, $introText, $uid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'INSERT INTO Profiles (about, intro_title, intro_text, user_id) VALUES (?, ?, ?, ?);';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($about, $introTitle, $introText, $uid))) {
                $stmt = null;
                header("location: ../profile.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }


        // GET ICON

        protected function getIcon($uid){
            //$files = preg_grep('~^'.$uid.'\..*~', scandir(__DIR__ . "../images/icons"));

            $path = '../images/icons'; 
            if(!glob($path.'/'.$uid.'.png')){
                echo $path.'/'.$uid.'.png';
            }
            else {
                echo $path.'/default.png';
            }
        }


        // SET ICON

        protected function setIcon($uid, $file){
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png', 'pdf');

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        $fileNameNew = $uid.".png";
                        $fileDestination = '../images/icons/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                    } else {
                        echo "Your file is too big!";
                    }
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this type!";
            } 
        }
    }
