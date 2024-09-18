<?php
    // PROFILE MODEL
    // BRAIN - makes database changes, queries database. Defines data logic and stores and retrieves data from database

    class ProfileInfo extends Dbh {

        // METHODS

        // GET PROFILE INFO
        // Returns associative array of all profile data for user

        protected function getProfileInfo($uid) {
            // PREPARE SQL STATEMENT
            // Select all user profile data
            $sql = 'SELECT * FROM Profiles WHERE user_id = ?;';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($uid))) {
                $stmt = null;
                header("location: profile.php?error=stmtfailed");
                exit();
            }

            // If statement returns no data... ERROR
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: profile.php?error=profilenotfound");
                exit();
            }

            // NO ERRORS

            // Fetch all the data from the query as an associative array
            $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $profileData;
        }



        // UPDATE PROFILE INFO
        // Update profile data 

        protected function updateProfileInfo($about, $introTitle, $introText, $uid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'UPDATE Profiles SET about = ?, intro_title = ?, intro_text = ? WHERE user_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($about, $introTitle, $introText, $uid))) {
                $stmt = null;
                header("location: profile.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }



        // SET PROFILE INFO
        // Update profile data 

        protected function setProfileInfo($about, $introTitle, $introText, $uid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'INSERT INTO Profiles (about, intro_title, intro_text, user_id) VALUES (?, ?, ?, ?);';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($about, $introTitle, $introText, $uid))) {
                $stmt = null;
                header("location: profile.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }
    }
