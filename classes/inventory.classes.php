<?php
    // INVENTORY MODEL
    // BRAIN - makes database changes, queries database. Defines data logic and stores and retrieves data from database

    class Inventory extends Dbh {

        // METHODS

        // GET INVENTORY INFO
        // Returns associative array of all profile data for user

        protected function getInventory($uid) {
            // PREPARE SQL STATEMENT
            // Select all user inventory data
            $sql = 'SELECT * FROM Inventory WHERE user_id = ?;';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($uid))) {
                $stmt = null;
                header("location: ../inventory.php?error=stmtfailed");
                exit();
            }

            // If statement returns no data... ERROR
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../inventory.php?error=profilenotfound");
                exit();
            }

            // NO ERRORS

            // Fetch all the data from the query as an associative array
            $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $inventory;
        }


        // SET INVENTORY
        // Update inventory data 

        protected function setInventory($balance, $uid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'INSERT INTO Inventory (balance, user_id) VALUES (?, ?);';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($balance, $uid))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }


        // UPDATE BALANCE
        // Update balance data 

        protected function updateBalance($balance, $uid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'UPDATE Inventory SET balance = ? WHERE user_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($balance, $uid))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }


        // SET GIFTBOX
        // Add giftbox with to user inventory

        protected function setBox($bid, $uid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'INSERT INTO Boxes (user_id, boxmodel_id) VALUES (?, ?);';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($uid, $bid))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }

        // GET GIFTBOXES
        // Return giftboxes associated with inventory

        protected function getBoxes($uid) {

            // PREPARE SQL STATEMENT
            // Select all user inventory data
            // $sql = 'SELECT * FROM Boxes WHERE user_id = ?;';
            $sql = 'SELECT b.*, m.* FROM Boxes AS b JOIN BoxModels AS m ON b.boxmodel_id = m.model_id WHERE b.user_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($uid))) {
                $stmt = null;
                header("location: ../inventory.php?error=stmtfailed");
                exit();
            }

            /* // If statement returns no data... ERROR
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../inventory.php?error=profilenotfound");
                exit();
            }*/

            // NO ERRORS

            // Fetch all the data from the query as an associative array
            $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $inventory;
        }
    }
