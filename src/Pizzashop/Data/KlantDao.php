<?php
//KlantDao.php
namespace Pizzashop\Data;

use Pizzashop\Entities\Klant;

class KlantDao{
    public function getById($mgr, $id){
        $klant = $mgr->getRepository('Pizzashop\\Entities\\Klant')->find($id);
        return $klant;
    }
    public function addKlant($mgr, $naam, $voornaam, $straat, $nr, $plaats, $telefoonnr){
        $klant = new Klant($naam, $voornaam, $straat, $nr, $plaats, $telefoonnr);
        $mgr->persist($klant);
        $mgr->flush();
        return $klant;
    }

}

