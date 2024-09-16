<?php
class Dbh {

    // Connect to database
    protected function connect(){
        try {
            $username = "lcasey1";
            $password = "%May1405";
            $hostname = "localhost";
            $dbname = "CapstoneProject";

            $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
            return $dbh;
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

}
?>