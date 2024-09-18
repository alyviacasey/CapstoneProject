<?php
// DATABASE MODEL
// BRAIN - makes database changes, queries database. Defines data logic and stores and retrieves data from database

class Dbh {

    // CONNECT
    // Connect to database

    protected function connect(){
        try {
            // Set database variables
            $username = "lcaseydo_lcasey1";
            $password = "%May1405";
            $hostname = "localhost";
            $dbname = "lcaseydo_CapstoneProject";

            // Connect to database
            $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
            return $dbh;
        }
        // Catch errors
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
