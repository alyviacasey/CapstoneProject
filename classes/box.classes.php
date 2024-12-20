<?php
    // TOY MODELS MODEL
    // BRAIN - makes database changes, queries database. Defines data logic and stores and retrieves data from database

    class Box extends Dbh {

        // METHODS

        // BOX MODEL 

        // GET BOX MODEL INFO
        // Returns associative array of all data for model

        protected function getBoxModel($bmid) {
            // PREPARE SQL STATEMENT
            // Select all user profile data
            $sql = 'SELECT * FROM BoxModels WHERE model_id = ?;';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($bmid))) {
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

        // SET BOX MODEL
        // Update model data 

        protected function setBoxModel($name, $price) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'INSERT INTO BoxModels (price, name) VALUES (?, ?);';
            $stmt = $this->connect()->prepare($sql);

            $name = $name . ' Box';

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($price, $name))) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }


        // dELETE BOX MODEL
        // Update model data 

        protected function unsetBoxModel($bmid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'DELETE FROM BoxModels WHERE model_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($bmid))) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }

        // GET BOX CONTENTS

        // GET BOX CONTENT INFO
        // Returns associative array of all data for model

        protected function getBoxContent($bmid) {
            // PREPARE SQL STATEMENT
            // Select all user profile data
            $sql = 'SELECT m.* FROM Models AS m JOIN BoxContents AS b ON m.model_id = b.toymodel_id WHERE b.boxmodel_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($bmid))) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            // NO ERRORS

            // Fetch all the data from the query as an associative array
            $modelData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $modelData;
        }

        // GET ALL BOXES IN STORE

        protected function getStore() {
            // PREPARE SQL STATEMENT
            $sql = 'SELECT * FROM BoxModels WHERE in_store = 1';
            $stmt = $this->connect()->prepare($sql);

            // If statement fails to execute... ERROR
            if(!$stmt->execute()) {
                $stmt = null;
                header("location: ../store.php?error=stmtfailed");
                exit();
            }

            // Fetch all the data from the query as an associative array
            $modelData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $modelData;
        }

        // CHECK IF BOX IS IN STORE BY ID

        protected function checkStore($bmid) {
            // PREPARE SQL STATEMENT
            $sql = 'SELECT * FROM BoxModels WHERE model_id = ? AND in_store = 1';
            $stmt = $this->connect()->prepare($sql);

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($bmid))) {
                $stmt = null;
                header("location: ../store.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                return false;
            }
            else {
                return true;
            }
        }

        // SET BOX IN STORE
        protected function setStore($bmid) {
            // PREPARE SQL STATEMENT
            $sql = 'UPDATE BoxModels SET in_store = 1 WHERE model_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($bmid))) {
                $stmt = null;
                header("location: ../store.php?error=stmtfailed");
                exit();
            }
        }

        // UNSET BOX IN STORE
        protected function unsetStore($bmid) {
            // PREPARE SQL STATEMENT
            $sql = 'UPDATE BoxModels SET in_store = 0 WHERE model_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($bmid))) {
                $stmt = null;
                header("location: ../store.php?error=stmtfailed");
                exit();
            }
        }


        // SEE IF TOY IS ALREADY IN BOXC ONTENTS

        // GET BOX CONTENT INFO
        // Returns true or false

        protected function getContentMatch($bmid, $tmid) {
            // PREPARE SQL STATEMENT
            // Select all user profile data
            $sql = 'SELECT * FROM BoxContents WHERE toymodel_id = ? AND boxmodel_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($tmid, $bmid))) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                return false;
            }
            else {
                return true;
            }

        }


        // SET BOX CONTENT
        // Update model data 

        protected function setBoxContent($bid, $tid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'INSERT INTO BoxContents (boxmodel_id, toymodel_id) VALUES (?, ?);';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($bid, $tid))) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }

        


        // REMOVE BOX CONTENT
        // Update model data 

        protected function unsetBoxContent($bid, $tid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'DELETE FROM BoxContents WHERE boxmodel_id = ? AND toymodel_id = ?;';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($bid, $tid))) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }


        // GET ALL BOX MODELS

        // GET BOX MODEL INFO
        // Returns associative array of all data for model

        protected function getAllBoxModels() {
            // PREPARE SQL STATEMENT
            // Select all user profile data
            $sql = 'SELECT * FROM BoxModels;';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute()) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            // If statement returns no data... ERROR
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../admin.php?error=modelsnotfound");
                exit();
            }

            // NO ERRORS

            // Fetch all the data from the query as an associative array
            $modelData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt = null;

            return $modelData;
        }

        // GET ICON

        protected function getImg($bmid){

            $path = '../images/giftboxes'; 
            if(count(glob('images/giftboxes/'.$bmid.'.png')) > 0){
                echo $path.'/'.$bmid.'.png';
            }
            else {
                echo $path.'/default.png';
            }
        }


        // SET ICON

        protected function setImg($bmid, $file){
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        $fileNameNew = $bmid.".png";
                        $fileDestination = '../images/giftboxes/'.$fileNameNew;
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