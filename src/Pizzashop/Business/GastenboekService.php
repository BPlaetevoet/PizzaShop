<?php
//GastenboekService.php
namespace Pizzashop\Business;

use Pizzashop\Data\GastenboekDao;

class GastenboekService{
    public function getAll($mgr){
        $lijst = (new GastenboekDao)->getAll($mgr);
        return $lijst;
    }
    public function getById($mgr, $id){
        $entry = (new GastenboekDao)->getById($mgr, $id);
        return $entry;
    }
    public function getLatestEntrys($mgr){
        $lijst = (new GastenboekDao)->getLatestEntrys($mgr);
        return $lijst;
    }
    public function addEntry($mgr, $naam, $mail, $boodschap){
        $entry = (new GastenboekDao)->addEntry($mgr, $naam, $mail, $boodschap);
        return $entry;
    }
}
