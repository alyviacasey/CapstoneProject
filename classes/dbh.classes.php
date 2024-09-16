<?php
class Dbh {

    // Connect to database
    protected function connect(){
        try {
            $username = "root";
            $password = "";
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