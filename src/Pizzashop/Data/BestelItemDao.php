<?php
//OrderitemDao.php
namespace Pizzashop\Data;
use Pizzashop\Entities\BestelItem;
use Pizzashop\Data\ProductDao;

class BestelItemDao{
    public function getById($mgr, $id){
        $item = $mgr->getRepository('Pizzashop\\Entities\\BestelItem')->find($id);
        return $item;
    }
    public function getPopularItems($mgr){
        $qb = $mgr->createQueryBuilder();
        $qb->select ('b')
               ->addselect('sum(b.aantal) AS AANTAL')
                ->from('Pizzashop\\Entities\\BestelItem', 'b')
                ->groupBy('b.product')
                ->orderBy('AANTAL', 'DESC')
                ->setMaxResults(5);
        $query = $qb->getQuery();
        $lijst = $query->getResult();
        return $lijst;
                
    }

}

