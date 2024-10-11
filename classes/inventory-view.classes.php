<?php
// INVENTORY VIEW
// UI
class InventoryView extends Inventory {

    // METHODS

    // FETCH BALANCE
    public function fetchBalance($uid) {
        $inventoryInfo = $this->getInventory($uid);
        echo $inventoryInfo[0]["balance"];
    }

    public function fetchBoxes($uid) {
        $inventoryInfo = $this->getBoxes($uid);
        return $inventoryInfo;
    }

}