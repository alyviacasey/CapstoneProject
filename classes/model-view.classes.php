<?php
// BOX VIEW
// UI
class ModelView extends Model {

    // METHODS

    // FETCH BALANCE
    public function fetchAllModels() {
        $modelInfo = $this->getAllModels();
        return $modelInfo;
    }

    public function fetchModel($toyID) {
        $modelInfo = $this->getModel($toyID);
        return $modelInfo;
    }

    public function deleteModel($toyID){
        $this->unsetModel($toyID);
    }

    public function editImg ($toyID, $file) {
        $this->setImg($toyID, $file);
    } 

    public function fetchImg ($toyID) {
        $this->getImg($toyID);
    }
    
}