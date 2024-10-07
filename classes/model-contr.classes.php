<?php
// MODEL CONTROLLER
// INPUT - Handles interaction from the user and interacts with model objects

class ModelContr extends Model {

    // FIELDS / PROPERTIES

    private $theme;
    private $name;
    private $material;

    // DEFINE CONSTRUCTOR

    public function __construct($theme, $name, $material){
        $this->theme = $theme;
        $this->name = $name;
        $this->material = $material;
    }

    // SIGN UP USER
    // Create new user 

    public function createModel() {
        // ERROR HANDLING
        if($this->emptyInput() == false) {
            header("location: ../model.php?error=emptyinput");
            exit();
        }

        // NO ERRORS
        // Create new user
        $this->setModel($this->theme, $this->name, $this->material);
    }


    // METHODS

    // EDIT PROFILE 
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
        if(empty($this->theme) || empty($this->name) || empty($this->material)) {
            $result = false;
        }
        else { 
            $result = true;
        }
        return $result;
    }


}