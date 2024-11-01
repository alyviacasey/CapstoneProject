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

    public function fetchImg ($boxID) {
        $this->getImg($boxID);
    }

    public function fetchStore () {
        $modelInfo = $this->getStore();
        return $modelInfo;
    }

    public function inStore($boxID){
        return $this->checkStore($boxID);
    }

    public function addToStore($boxID){
        $this->setStore($boxID);
    }

    public function removeFromStore($boxID){
        $this->unsetStore($boxID);
    }
}