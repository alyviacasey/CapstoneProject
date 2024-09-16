<?php
class Dbh {

    // Connect to database
    protected function connect(){
        try {
            $username = "lcasey1";
            $password = "%May1405";

            $dbh = new PDO('mysql:host=lcaseydo;dbname=CapstoneProject', $username, $password);
            return $dbh;
        }
        catch (PDOException $e) {
            print "Error!:" . $e->getMessage() . "<br/>";
            die();
        }

    }

}
?>