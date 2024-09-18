<?php
// PROFILE CONTROLLER
// INPUT - Handles interaction from the user and interacts with model objects

class ProfileContr extends ProfileInfo {

    // FIELDS / PROPERTIES

    private $uid;
    private $usn;

    // DEFINE CONSTRUCTOR

    public function __construct($uid, $usn){
        $this->uid = $uid;
        $this->usn = $usn;
    }



    // METHODS

    // DEFAULT PROFILE INFO
    // Set profile text to default messages

    public function defaultProfileInfo() {
        $about = "Tell people about yourself!";
        $introTitle = "Hello! I am " . $this->usn;
        $introText = "Welcome to my profile page!";

        $this->setProfileInfo($about, $introTitle, $introText, $this->uid);
    }



    // EDIT PROFILE INFO
    // User inputs new profile info

    public function editProfileInfo($about, $introTitle, $introText) {

        // ERROR HANDLING

        if($this->emptyInput($about, $introTitle, $introText) == true) {
            header("location: ../profilesettings.php?error=emptyinput");
            exit();
        }

        // NO ERRORS
        // Update profile inmfo
        $this->updateProfileInfo($about, $introTitle, $introText, $this->uid);

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
