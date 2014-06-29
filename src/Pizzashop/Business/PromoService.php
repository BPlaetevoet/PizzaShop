<?php
//PromoService.php
namespace Pizzashop\Business;

use Pizzashop\Data\PromoDao;

class PromoService{
    public function getAll($mgr){
        $lijst = (new PromoDao)->getAll($mgr);
        return $lijst;
    }
    public function getById($mgr, $id){
        $promo = (new PromoDao)->getById($mgr, $id);
        return $promo;
    }
    public function getByProduct($mgr, $product){
        $lijst = (new PromoDao)->getByProduct($mgr, $product);
        return $lijst;
    }
    public function getByBegindatum($mgr, $begindatum){
        $lijst = (new PromoDao)->getByBegindatum($mgr, $begindatum);
        return $lijst;
    }
    public function getByEinddatum($mgr, $einddatum){
        $lijst = (new PromoDao)->getByEinddatum($mgr, $einddatum);
        return $lijst;
    }
    public function getPromosVanPeriode($mgr, $begindatum, $einddatum){
        $lijst = (new PromoDao)->getPromosVanPeriode($mgr, $begindatum, $einddatum);
        return $lijst;
    }
    public function getHuidigePromos($mgr){
        $lijst = (new PromoDao)->getHuidigePromos($mgr);
        return $lijst;
    }
    public function getVerwachtePromos($mgr){
        $lijst = (new PromoDao)->getVerwachtePromos($mgr);
        return $lijst;
    }
}
