<?php
namespace Pizzashop\Business;

use Pizzashop\Data\BestelItemDao;

class BestelItemService{

    public function getPopularItems($mgr){
        $lijst = (new BestelItemDao)->GetPopularItems($mgr);
        return $lijst;
    }
}


