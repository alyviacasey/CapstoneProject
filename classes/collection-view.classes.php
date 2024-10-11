<?php
// COLLECTION VIEW
// UI
class CollectionView extends Collection {

    // METHODS

    // FETCH TOYS
    public function fetchToys($uid) {
        $collectionInfo = $this->getToys($uid);
        return $collectionInfo;
    }

}