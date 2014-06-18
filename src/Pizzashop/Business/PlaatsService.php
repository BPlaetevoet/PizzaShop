<?php
//PlaatsService.php
namespace Pizzashop\Business;

use Pizzashop\Data\PlaatsDao;

class PlaatsService{
    public function getAll($mgr){
        $lijst = PlaatsDao::getAll($mgr);
        return $lijst;
    }
    public function getById($mgr, $id){
        $plaats = PlaatsDao::getById($mgr, $id);
        return $plaats;
    }
    public function getByPostcode($mgr, $postcode){
        $plaats = PlaatsDao::getByPostcode($mgr, $postcode);
        return $plaats;
    }
    public function getByGemeente($mgr, $gemeente){
        $plaats = PlaatsDao::getByGemeente($mgr, $gemeente);
        return $plaats;
    }
    public function addPlaats($mgr, $postcode, $gemeente){
        $plaats = PlaatsDao::addPlaats($mgr, $postcode, $gemeente);
        return $plaats;
    }
    public function updatePlaats($mgr, $postcode, $gemeente){
        $plaats = PlaatsDao::updatePlaats($mgr, $postcode, $gemeente);
        return $plaats;
    }
    public function deletePlaats($mgr, $plaats){
        PlaatsDao::deletePlaats($mgr, $plaats);
    }
}

