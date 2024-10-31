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

    public function fetchContents($bmid){
        $contents = $this->getBoxContent($bmid);
        return $contents;
    }

    public function deleteBoxModel($bmid){
        $this->unsetBoxModel($bmid);
    }

    public function editImg ($boxID, $file) {
        $this->setImg($boxID, $file);
    }
}