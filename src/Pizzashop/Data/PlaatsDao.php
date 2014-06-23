<?php
//PlaatsDao.php
namespace Pizzashop\Data;

use Pizzashop\Entities\Plaats;

class PlaatsDao{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Pizzashop\\Entities\\Plaats')->findAll();
        return $lijst;
    }
    public function getById($mgr, $id){
        $plaats = $mgr->getRepository('Pizzashop\\Entities\\Plaats')->find($id);
        return $plaats;
    }
    public function getByPostcode($mgr, $postcode){
        $plaats = $mgr->getRepository('Pizzashop\\Entities\\Plaats')->findByPostcode($postcode);
        return $plaats;
    }
    public function getByGemeente($mgr, $gemeente){
        $plaats = $mgr->getRepository('Pizzashop\\Entities\\Plaats')->findByGemeente($gemeente);
        return $plaats;
    }
    public function addPlaats($mgr, $postcode, $gemeente){
        $plaats = new Plaats($postcode, $gemeente);
        $mgr->persist($plaats);
        $mgr->flush();
        return $plaats;
    }
    public function updatePlaats($mgr, $id, $postcode, $gemeente){
        $plaats = PlaatsDao::getById($mgr, $id);
        $plaats->setPostcode($postcode);
        $plaats->setGemeente($gemeente);
        $mgr->persist($plaats);
        $mgr->flush();
        return $plaats;
    }
    protected static function deletePlaats($mgr, $plaats){
        $mgr->remove($plaats);
        $mgr->flush();
    }
}

