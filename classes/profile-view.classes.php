<?php
// PROFILE VIEW
// UI
class ProfileView extends Profile {

    // METHODS

    // FETCH ABOUT
    public function fetchAbout($uid) {
        $profileInfo = $this->getProfile($uid);
        echo $profileInfo[0]["about"];
    }

    // FETCH INTRO TITLE
    public function fetchIntroTitle($uid) {
        $profileInfo = $this->getProfile($uid);
        echo $profileInfo[0]["intro_title"];
    }

    // FETCH INTRO TEXT
    public function fetchIntroText($uid) {
        $profileInfo = $this->getProfile($uid);
        echo $profileInfo[0]["intro_text"];
    }

    public function fetchIcon($uid) {
        echo $this->getIcon($uid);
    }

}