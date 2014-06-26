<?php
//PromoDao.php
namespace Pizzashop\Data;

use Pizzashop\Entities\Promo;

class PromoDao{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Pizzashop\\Entities\\Promo')->findAll();
        return $lijst;
    }
    public function getById($mgr, $id){
        $promo = $mgr->getRepository('Pizzashop\\Entities\\Promo')->find($id);
        return $promo;
    }
    public function getByProduct($mgr, $product) {
        $lijst = $mgr->getRepository('Pizzashop\\Entities\\Promo')->findBy(array('product'=>$product));
        return $lijst;
    }
    public function getByBegindatum($mgr, $begindatum){
        $lijst = $mgr->getRepository('Pizzashop\\Entities\\Promo')->findBy(array('begindatum'=>$begindatum));
        return $lijst;
    }
    public function getByEinddatum($mgr, $einddatum){
        $lijst = $mgr->getRepository('Pizzashop\\Entities\\Promo')->findBy(array('einddatum'=>$einddatum));
        return $lijst;
    }
    public function getPromosVanPeriode($mgr, $begindatum, $einddatum){
        $query = $mgr->createQuery('select p from Pizzashop\\Entities\\Promo p where p.begindatum =<' .$begindatum.' AND p.einddatum >='.$einddatum);
        $lijst = $query->getResult();
        return $lijst;
    }
    public function getHuidigePromos($mgr){
        $qb = $mgr->createQueryBuilder();
        $qb->select('p')
                ->from('Pizzashop\\Entities\\Promo', 'p')
                ->where(' :today BETWEEN p.begindatum AND p.einddatum')
                ->setParameter('today', new \DateTime('NOW'))
                ;
        $query = $qb->getQuery();
        $lijst = $query->getResult();
        return $lijst;
    }
    public function getVerwachtePromos($mgr){
        $qb = $mgr->createQueryBuilder();
        $qb->select('p')
                ->from('Pizzashop\\Entities\\Promo', 'p')
                ->where(' :today < p.begindatum')
                ->setParameter('today', new \DateTime('NOW'))
                ->orderBy('p.begindatum');
        
        $query = $qb->getQuery();
        $lijst = $query->getResult();
        return $lijst;
    }
    public function addPromo($mgr, $product, $begindatum, $einddatum, $promoprijs){
        $promo = new Promo($product, $promoprijs, $begindatum, $einddatum);
        $mgr->persist($promo);
        $mgr->flush();
    }
    public function deletePromo($mgr, $promo){
        $mgr->remove($promo);
        $mgr->flush();
    }
    public function updatePromo($mgr, $id, $product, $begindatum, $einddatum, $promoprijs){
        $promo = PromoDao::getById($mgr, $id);
        $promo->setProduct($product);
        $promo->setBegindatum($begindatum);
        $promo->setEinddatum($einddatum);
        $promo->setPromoprijs($promoprijs);
        $mgr->persist($promo);
        $mgr->flush();
        return $promo;
    }
    
}


