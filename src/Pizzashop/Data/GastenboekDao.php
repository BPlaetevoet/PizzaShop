<?php
namespace Pizzashop\Data;

use Pizzashop\Entities\Gastenboek;

class GastenboekDao{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Pizzashop\\Entities\\Gastenboek')->findAll();
        return $lijst;
    }
    public function getLatestEntrys($mgr){
        $qb= $mgr->createQueryBuilder();
        $qb->select('g')
                ->from('Pizzashop\\Entities\\Gastenboek', 'g')
                ->orderBy('g.datum', 'DESC');
        $qb->setMaxResults(3);
        $query = $qb->getQuery();
        $lijst = $query->getResult();
        return $lijst;
    }
    public function getById($mgr, $id){
        $entry = $mgr->getRepository('Pizzashop\\Entities\\Gastenboek')->find($id);
        return $entry;
    }
    public function addEntry($mgr, $naam, $mail, $boodschap){
        $entry = new Gastenboek($naam, $mail, $boodschap);
        $mgr->persist($entry);
        $mgr->flush();
        return $entry;
    }
}


