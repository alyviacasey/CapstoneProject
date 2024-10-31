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

}