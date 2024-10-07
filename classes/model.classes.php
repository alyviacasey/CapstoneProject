<?php
    // PROFILE MODEL
    // BRAIN - makes database changes, queries database. Defines data logic and stores and retrieves data from database

    class Model extends Dbh {

        // METHODS

        // GET MODEL INFO
        // Returns associative array of all data for model

        protected function getModel($mid) {
            // PREPARE SQL STATEMENT
            // Select all user profile data
            $sql = 'SELECT * FROM Models WHERE model_id = ?;';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($mid))) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            // If statement returns no data... ERROR
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../admin.php?error=modelnotfound");
                exit();
            }

            // NO ERRORS

            // Fetch all the data from the query as an associative array
            $modelData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $modelData;
        }



        /* // UPDATE MODEL
        // Update model data 

        protected function updateModel($theme, $name, $material, $mid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'UPDATE Models SET theme = ?, name = ?, material = ? WHERE model_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($theme, $name, $material, $mid))) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        } */



        // SET MODEL
        // Update model data 

        protected function setModel($theme, $name, $material) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'INSERT INTO Models (theme, name, material, release_date) VALUES (?, ?, ?, ?);';
            $stmt = $this->connect()->prepare($sql);

            // Set date to update registration date
            date_default_timezone_set('EST');
            $today = date('Y-m-d');

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($theme, $name, $material, $today))) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }

    }