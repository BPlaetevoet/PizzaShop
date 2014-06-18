<?php
//KlantService.php
namespace Pizzashop\Business;

use Pizzashop\Data\KlantDao;

class KlantService{
    public function getById($mgr, $id){
        $klant = KlantDao::getById($mgr, $id);
        return $klant;
    }
    public function addKlant($mgr, $naam, $voornaam, $straat, $nr, $plaats, $telefoonnr){
        $klant = KlantDao::addKlant($mgr, $naam, $voornaam, $straat, $nr, $plaats, $telefoonnr);
        return $klant;
    }
}

