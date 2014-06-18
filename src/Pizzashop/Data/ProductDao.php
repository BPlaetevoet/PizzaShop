<?php
//ProductDao.php
namespace Pizzashop\Data;

use Pizzashop\Entities\Product;

class ProductDao{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Pizzashop\\Entities\\Product')->findAll();
        return $lijst;
    }
    public function getOneByValue($mgr, $value){
        $product = $mgr->getRepository('Pizzashop\\Entities\\Product')->findOneBy($value);
        return $product;
    }
    public function getOrderedByValue($mgr, $value){
        $query = $mgr->createQuery('select p from Pizzashop\\Entities\\Product p order by p.'.$value);
        $lijst = $query->getResult();
        return $lijst;
    }
    public function addProduct($mgr, $naam, $prijs){
        $product = new Product($naam, $prijs);
        $mgr->persist($product);
        $mgr->flush();
        return $product;
    }
    public function deleteProduct($mgr, $product){
        $mgr->remove($product);
        $mgr->flush();
    }
    public function updateProduct($mgr, $id, $naam, $samenstelling, $prijs, $promoprijs){
        $product = ProductDao::getByValue($mgr, $id);
        $product->setNaam($naam);
        $product->setSamenstelling($samenstelling);
        $product->setPrijs($prijs);
        $product->setPromoprijs($promoprijs);
        $mgr->persist($product);
        $mgr->flush();
        return $product;
    }
}

