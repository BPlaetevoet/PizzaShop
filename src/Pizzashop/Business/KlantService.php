<?php
//KlantService.php
namespace Pizzashop\Business;

use Pizzashop\Data\KlantDao;

class KlantService{
    public function getById($mgr, $id){
        $klant = (new KlantDao)->getById($mgr, $id);
        return $klant;
    }
    public function addKlant($mgr, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr){
        $klant = (new KlantDao)->addKlant($mgr, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr);
        return $klant;
    }
    public function UpdateKlant($mgr, $id, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr){
        $klant = (new KlantDao)->UpdateKlant($mgr, $id, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr);
        return $klant;
    }
}

