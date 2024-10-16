<?php
// INVENTORY CONTROLLER
// INPUT - Handles interaction from the user and interacts with model objects

class InventoryContr extends Inventory {

    // FIELDS / PROPERTIES

    private $uid; // user id

    // DEFINE CONSTRUCTOR

    public function __construct($uid){
        $this->uid = $uid;
    }



    // METHODS

    // DEFAULT INVENTORY
    // Set balance to 100

    public function defaultInventory() {
        $balance = 100;

        $this->setInventory($balance, $this->uid);
    }



    // EDIT BALANCE 
    // User inputs new balance info

    public function editBalance($balance) {

        // ERROR HANDLING

        if($this->emptyInput($balance) == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        // NO ERRORS
        // Update profile info
        $this->updateBalance($balance, $this->uid);

    }

    // GET GIFT BOX
    // Give user a gift box

    public function getBox($bid) { 

        //ERROR HANDLING

        if($this->emptyInput($bid) == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        // NO ERRORS
        // Set box

        $this->setBox($this->uid, $bid);
    }



    // EMPTY INPUT
    // Check for empty / blank inputs in form

    private function emptyInput($balance) {
        $result = false;
        if(empty($balance)) {
            $result = false;
        }
        else { 
            $result = true;
        }
        return $result;
    }


}