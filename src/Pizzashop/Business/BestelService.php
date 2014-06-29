<?php
namespace Pizzashop\Business;

use Pizzashop\Data\BestellingDao;

class BestelService{
    public function getById($mgr, $id){
        $bestelling = (new BestellingDao)->getById($mgr, $id);
        return $bestelling;
    }
    public function getAll($mgr){
        $lijst = (new BestellingDao)->getAll($mgr);
        return $lijst;
    }
    
    public function addBestelling($mgr, $klant, $bestelItems){
        $bestelling = (new BestellingDao)->addBestelling($mgr, $klant, $bestelItems);
        return $bestelling;
    }
}
