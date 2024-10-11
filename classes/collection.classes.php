<?php
    // COLLECTION MODEL
    // BRAIN - makes database changes, queries database. Defines data logic and stores and retrieves data from database

    class Collection extends Dbh {

        // METHODS

        // GET COLLECTION
        // Returns associative array of all toy data for user

        protected function getToys($uid) {

            // PREPARE SQL STATEMENT
            // Select all user inventory data
            // $sql = 'SELECT * FROM Boxes WHERE user_id = ?;';
            $sql = 'SELECT t.*, m.* FROM Toys AS t JOIN Models AS m ON t.model_id = m.model_id WHERE t.user_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($uid))) {
                $stmt = null;
                header("location: ../collection.php?error=stmtfailed");
                exit();
            }

            /* // If statement returns no data... ERROR
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../collection.php?error=profilenotfound");
                exit();
            } */

            // NO ERRORS

            // Fetch all the data from the query as an associative array
            $collection = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $collection;
        }


        // SET TOY
        // Update toy data 

        protected function setToy($mid, $uid, $name) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'INSERT INTO Toys (model_id, user_id, toy_name, adoption_date) VALUES (?, ?, ?, ?);';
            $stmt = $this->connect()->prepare($sql);

            $today = date('Y-m-d');

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($mid, $uid, $name, $today))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }


        // UPDATE NAME
        // Update name data 

        protected function updateName($tid, $name) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'UPDATE Toys SET toy_name = ? WHERE toy_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($name, $tid))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }
    }
