<?php
//PromoServcie.php
namespace Pizzashop\Business;

use Pizzashop\Data\PromoDao;

class PromoService{
    public function getAll($mgr){
        $lijst = PromoDao::getAll($mgr);
        return $lijst;
    }
    public function getById($mgr, $id){
        $promo = PromoDao::getById($mgr, $id);
        return $promo;
    }
    public function getByProduct($mgr, $product){
        $lijst = PromoDao::getByProduct($mgr, $product);
        return $lijst;
    }
    public function getByBegindatum($mgr, $begindatum){
        $lijst = PromoDao::getByBegindatum($mgr, $begindatum);
        return $lijst;
    }
    public function getByEinddatum($mgr, $einddatum){
        $lijst = PromoDao::getByEinddatum($mgr, $einddatum);
        return $lijst;
    }
    public function getPromosVanPeriode($mgr, $begindatum, $einddatum){
        $lijst = PromoDao::getPromosVanPeriode($mgr, $begindatum, $einddatum);
        return $lijst;
    }
    public function getHuidigePromos($mgr, $datum){
        $lijst = PromoDao::getHuidigePromos($mgr, $datum);
        return $lijst;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

