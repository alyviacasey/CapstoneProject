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


    public function purchaseBox($bid, $price) { 

        //ERROR HANDLING

        if($this->emptyInput($bid) == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        // NO ERRORS
        // Set box

        $inventory = $this->getInventory($this->uid);

        if ($inventory[0]['balance'] < $price) {
            header("location: ../index.php?error=insufficientfunds");
            exit();
        }
        else {
            $this->updateBalance($inventory[0]['balance'] - $price, $this->uid);
            $this->createBox($bid, $this->uid);
            header("location: ../store.php?error=none");
        }
    }

    public function rollBox($bid) {
        $box = $this->getBox($bid);

        if (empty($box)) {
            header("location: ../index.php?error=boxnotfound");
            exit();
        }

        $modelID = $box[0]['boxmodel_id'];

        do {
            $rarity = $this->rollRarity(); 
            $matches = $this->matchRarity($modelID, $rarity);
        } while (empty($matches));
        
        $key = array_rand($matches, 1);

        $prize = $matches[$key];

        return $prize;
    }

    public function sellBox($bid) {
        $box = $this->getBox($bid);
        $price = $box[0]['price'];

        $this->updateBalance($this->getInventory($this->uid)[0]['balance'] + $price, $this->uid);
        $this->destroyBox($bid);
    }

    public function deleteBox($bid) {
        $this->destroyBox($bid);
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