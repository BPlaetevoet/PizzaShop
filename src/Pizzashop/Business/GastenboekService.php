<?php
//GastenboekService.php
namespace Pizzashop\Business;

use Pizzashop\Data\GastenboekDao;

class GastenboekService{
    public function getAll($mgr){
        $lijst = GastenboekDao::getAll($mgr);
        return $lijst;
    }
    public function getById($mgr, $id){
        $entry = GastenboekDao::getById($mgr, $id);
        return $entry;
    }
    public function getLatestEntrys($mgr){
        $lijst = GastenboekDao::getLatestEntrys($mgr);
        return $lijst;
    }
    public function addEntry($mgr, $naam, $mail, $boodschap){
        $entry = GastenboekDao::addEntry($mgr, $naam, $mail, $boodschap);
        return $entry;
    }
}
