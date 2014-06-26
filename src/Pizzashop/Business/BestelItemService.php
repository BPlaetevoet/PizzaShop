<?php
namespace Pizzashop\Business;

use Pizzashop\Data\BestelItemDao;

class BestelItemService{
    public function getPopularItems($mgr){
        $lijst = BestelItemDao::getPopularItems($mgr);
        return $lijst;
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

