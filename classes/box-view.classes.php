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

    public function fetchContents($boxID){
        $contents = $this->getBoxContent($boxID);
        return $contents;
    }

    public function deleteBoxModel($boxID){
        $this->unsetBoxModel($boxID);
    }

    public function editImg ($boxID, $file) {
        $this->setImg($boxID, $file);
    }
}