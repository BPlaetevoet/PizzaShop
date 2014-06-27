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
    public function addBestelling($mgr, $klant, $cartItems){
        $bestelling = new Bestelling($klant);
        $bedrag = 0;
        foreach($cartItems as $item=>$value){
            $product = ProductService::getById($mgr, $item);
            $aantal = $value["aantal"];
            $prijs = $value["prijs"];
            $bestelItem = new BestelItem($product, $aantal, $prijs, $bestelling);
            $bestelling->addItem($bestelItem);
            $bedrag += $prijs*$aantal;
        }
        $bestelling->setBedrag($bedrag);
        $mgr->persist($bestelling);
        $mgr->flush();
        return $bestelling;
    }
    public function addBestelling_old($mgr, $klant, $bestelItems){
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


