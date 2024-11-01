<?php
    // TOY MODELS MODEL
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

        protected function setModel($theme, $name, $material, $rarity) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'INSERT INTO Models (theme, model_name, material, rarity, release_date) VALUES (?, ?, ?, ?, ?);';
            $stmt = $this->connect()->prepare($sql);

            // Set date to update registration date
            date_default_timezone_set('EST');
            $today = date('Y-m-d');

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($theme, $name, $material, $rarity, $today))) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }


        // dELETE TOY MODEL
        // Update model data 

        protected function unsetModel($tmid) {
            // PREPARE SQL STATEMENT
            // Update 
            $sql = 'DELETE FROM Models WHERE model_id = ?';
            $stmt = $this->connect()->prepare($sql);

            // ERROR HANDLING

            // If statement fails to execute... ERROR
            if(!$stmt->execute(array($tmid))) {
                $stmt = null;
                header("location: ../admin.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }
 

        // GET ALL MODELS

        // GET MODEL INFO
        // Returns associative array of all data for model

        protected function getAllModels() {
            // PREPARE SQL STATEMENT
            // Select all user profile data
            $sql = 'SELECT * FROM Models;';
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


        // GET IMAGE
        // Returns image by ID

        protected function getImg($tmid){

            $path = '../images/toys'; 
            if(count(glob('images/toys/'.$tmid.'.png')) > 0){
                echo $path.'/'.$tmid.'.png';
            }
            else {
                echo $path.'/default.png';
            }
        }


        // SET IMAGE

        protected function setImg($tmid, $file){
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
                        $fileNameNew = $tmid.".png";
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