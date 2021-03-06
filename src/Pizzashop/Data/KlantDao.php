<?php
//KlantDao.php
namespace Pizzashop\Data;

use Pizzashop\Entities\Klant;

class KlantDao{
    public function getById($mgr, $id){
        $klant = $mgr->getRepository('Pizzashop\\Entities\\Klant')->find($id);
        return $klant;
    }
    public function addKlant($mgr, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr){
        $klantexists = $mgr->getRepository('Pizzashop\\Entities\\Klant')->findOneBy(
         array(
            'naam'=>$naam,
            'voornaam'=>$voornaam,
            'straat'=>$straat,
            'nr'=>$nr,
            'telefoonnr'=>$telefoonnr
        ));
        if ($klantexists) {
            return $klantexists;
        }else{
            $klant = new Klant($naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr);
            $mgr->persist($klant);
            $mgr->flush();
            return $klant;
        }
        
    }
    public function UpdateKlant($mgr, $id, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr){
        $klant = (new KlantDao)->getById($mgr, $id);
        $klant->setNaam($naam);
        $klant->setVoornaam($voornaam);
        $klant->setStraat($straat);
        $klant->setNr($nr);
        $klant->setBus($bus);
        $klant->setPlaats($plaats);
        $klant->setTelefoonnr($telefoonnr);
        $mgr->persist($klant);
        $mgr->flush();
        return $klant;
    }

}

