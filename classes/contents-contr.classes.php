<?php
// BOX MODEL CONTROLLER
// INPUT - Handles interaction from the user and interacts with model objects

class ContentContr extends Box {

    // FIELDS / PROPERTIES

    private $bmid;
    private $tmid;

    // DEFINE CONSTRUCTOR

    public function __construct($bmid, $tmid){
        $this->bmid = $bmid;
        $this->tmid = $tmid;

    }

    // CREATE MODEL
    // Create new toy model

    public function addContents() {
        // NO ERRORS
        // Create new user
        $this->setBoxContent($this->bmid, $this->tmid);
    }

    public function removeContents() {
        // NO ERRORS
        // Create new user
        $this->unsetBoxContent($this->bmid, $this->tmid);
    }

    public function matchContents(){
        return $this->getContentMatch($this->bmid, $this->tmid);
    }
}
