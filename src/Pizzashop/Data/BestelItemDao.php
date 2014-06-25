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
  

}

