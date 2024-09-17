<?php
class Dbh {

    // Connect to database
    protected function connect(){
        try {
            $username = "lcaseydo_lcasey1";
            $password = "%May1405";
            $hostname = "localhost";
            $dbname = "lcaseydo_CapstoneProject";

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