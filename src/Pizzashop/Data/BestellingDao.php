<?php
namespace Pizzashop\Data;

use Pizzashop\Entities\Bestelling;
use Pizzashop\Entities\BestelItem;
use Pizzashop\Business\ProductService;

class BestellingDao{
    public function getById($mgr, $id){
        $bestelling = $mgr->getRepository('Pizzashop\\Entities\\Bestelling')->find($id);
        return $bestelling;
    }
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Pizzashop\\Entities\\Bestelling')->findAll();
        return $lijst;
    }
    public function getPopularItems($mgr){
        $qb = $mgr->createQueryBuilder();
        $qb->select ('b.product')
                ->from('Pizzashop\\Entities\\Bestelling')
                ->groupBy('b.product');
                
    }
    public function addBestelling($mgr, $klant, $bestelItems){
        $bestelling = new Bestelling($klant);
        $bedrag = 0;
        foreach($bestelItems as $item => $aantal){
            $product = ProductService::getById($mgr, $item);
            $bestelItem = new BestelItem($product, $aantal, $product->getPrijs(), $bestelling);
            $bestelling->addItem($bestelItem);
            $bedrag += ($bestelItem->getB_Prijs()*$aantal);
        }
        $bestelling->setBedrag($bedrag);
        $mgr->persist($bestelling);
        $mgr->flush();
        return $bestelling;
    }
}


