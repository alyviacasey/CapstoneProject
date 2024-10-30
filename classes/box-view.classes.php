<?php
// BOX VIEW
// UI
class BoxView extends Box {

    // METHODS

    // FETCH BALANCE
    public function fetchAllBoxModels() {
        $modelInfo = $this->getAllBoxModels();
        return $modelInfo;
    }

}