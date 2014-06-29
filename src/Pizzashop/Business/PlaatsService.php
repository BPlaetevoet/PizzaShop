<?php
//PlaatsService.php
namespace Pizzashop\Business;

use Pizzashop\Data\PlaatsDao;

class PlaatsService{
    public static function getAll($mgr){
        $lijst = (new PlaatsDao)->getAll($mgr);
        return $lijst;
    }
    public function getById($mgr, $id){
        $plaats = (new PlaatsDao)->getById($mgr, $id);
        return $plaats;
    }
    public static function getByPostcode($mgr, $postcode){
        $plaats = (new PlaatsDao)->getByPostcode($mgr, $postcode);
        return $plaats;
    }
    public static function getByGemeente($mgr, $gemeente){
        $plaats = (new PlaatsDao)->getByGemeente($mgr, $gemeente);
        return $plaats;
    }
    public function addPlaats($mgr, $postcode, $gemeente){
        $plaats = (new PlaatsDao)->addPlaats($mgr, $postcode, $gemeente);
        return $plaats;
    }
    public function updatePlaats($mgr, $postcode, $gemeente){
        $plaats = (new PlaatsDao)->updatePlaats($mgr, $postcode, $gemeente);
        return $plaats;
    }
    public function deletePlaats($mgr, $plaats){
        (new PlaatsDao)->deletePlaats($mgr, $plaats);
    }
}

