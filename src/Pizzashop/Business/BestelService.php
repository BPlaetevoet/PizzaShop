<?php
namespace Pizzashop\Business;

use Pizzashop\Data\BestellingDao;

class BestelService{
    public function getById($mgr, $id){
        $bestelling = BestellingDao::getById($mgr, $id);
        return $bestelling;
    }
    public function getAll($mgr){
        $lijst = BestellingDao::getAll($mgr);
        return $lijst;
    }
    public function getPopularItems($mgr){
        $lijst = BestellingDao::getPopularItems($mgr);
        return $lijst;
    }
    public function addBestelling($mgr, $klant, $bestelItems){
        $bestelling = BestellingDao::addBestelling($mgr, $klant, $bestelItems);
        return $bestelling;
    }
}
