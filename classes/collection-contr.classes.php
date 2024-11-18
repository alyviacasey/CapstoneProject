<?php
// COLLECTION CONTROLLER
// INPUT - Handles interaction from the user and interacts with model objects

class CollectionContr extends Collection {

    // FIELDS / PROPERTIES

    private $uid; // user id

    // DEFINE CONSTRUCTOR

    public function __construct($uid){
        $this->uid = $uid;
    }



    // METHODS



    // EDIT BALANCE 
    // User inputs new balance info

    /* public function editName($name) {

        // ERROR HANDLING

        if($this->emptyInput($name) == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        // NO ERRORS
        // Update profile info
        $this->updateName($name, $this->uid);

    } */

    // GET TOY
    // Give user a toy

    public function getToy($tmid, $name) { 

        //ERROR HANDLING

        if($this->emptyInput($tmid, $name) == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        // NO ERRORS
        // Set box

        $this->setToy($tmid, $this->uid, $name);

        $stmt = null;
    }



    // EMPTY INPUT
    // Check for empty / blank inputs in form

    private function emptyInput($tid, $name) {
        $result = false;
        if(empty($tid) || empty($name)) {
            $result = false;
        }
        else { 
            $result = true;
        }
        return $result;
    }


}