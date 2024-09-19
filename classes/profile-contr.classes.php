<?php
// PROFILE CONTROLLER
// INPUT - Handles interaction from the user and interacts with model objects

class ProfileContr extends Profile {

    // FIELDS / PROPERTIES

    private $uid;
    private $usn;

    // DEFINE CONSTRUCTOR

    public function __construct($uid, $usn){
        $this->uid = $uid;
        $this->usn = $usn;
    }



    // METHODS

    // DEFAULT PROFILE 
    // Set profile text to default messages

    public function defaultProfile() {
        $about = "Tell people about yourself!";
        $introTitle = "Hello! I am " . $this->usn;
        $introText = "Welcome to my profile page!";

        $this->setProfile($about, $introTitle, $introText, $this->uid);
    }



    // EDIT PROFILE 
    // User inputs new profile info

    public function editProfile($about, $introTitle, $introText) {

        // ERROR HANDLING

        if($this->emptyInput($about, $introTitle, $introText) == false) {
            header("location: ../profilesettings.php?error=emptyinput");
            exit();
        }

        // NO ERRORS
        // Update profile info
        $this->updateProfile($about, $introTitle, $introText, $this->uid);

    }



    // EMPTY INPUT
    // Check for empty / blank inputs in form

    private function emptyInput($about, $introTitle, $introText) {
        $result = false;
        if(empty($about) || empty($introTitle) || empty($introText)) {
            $result = false;
        }
        else { 
            $result = true;
        }
        return $result;
    }


}
