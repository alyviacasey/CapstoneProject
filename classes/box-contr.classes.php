<?php
// BOX MODEL CONTROLLER
// INPUT - Handles interaction from the user and interacts with model objects

class BoxContr extends Box {

    // FIELDS / PROPERTIES

    private $name;
    private $price;

    // DEFINE CONSTRUCTOR

    public function __construct($name, $price){
        $this->name = $name;
        $this->price = $price;

    }

    // CREATE MODEL
    // Create new toy model

    public function createModel() {
        // ERROR HANDLING
        if($this->emptyInput() == false) {
            header("location: ../model.php?error=emptyinput");
            exit();
        }

        // NO ERRORS
        // Create new user
        $this->setBoxModel($this->name, $this->price);
    }


    // METHODS

    // EDIT MODEL 
    // User inputs new profile info

    /* public function editModel($theme, $name, $material) {

        // ERROR HANDLING

        if($this->emptyInput() == false) {
            header("location: ../profilesettings.php?error=emptyinput");
            exit();
        }

        // NO ERRORS
        // Update profile info
        $this->updateProfile($theme, $name, $material, $this->uid);

    } */


    // EMPTY INPUT
    // Check for empty / blank inputs in form

    private function emptyInput() {
        $result = false;
        if(empty($this->name) || empty($this->price)) {
            $result = false;
        }
        else { 
            $result = true;
        }
        return $result;
    }


}