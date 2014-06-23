<?php
//ProductDao.php
namespace Pizzashop\Data;

use Pizzashop\Entities\Product;
use Pizzashop\Data\IngredientDao;

class ProductDao{
    public function getAll($mgr){
        $lijst = $mgr->getRepository('Pizzashop\\Entities\\Product')->findAll();
        return $lijst;
    }
    public function getById($mgr, $id){
        $product = $mgr->getRepository('Pizzashop\\Entities\\Product')->find($id);
        return $product;
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
    public function addProduct($mgr, $naam, $prijs_small, $prijs_large, $samenstelling){
        $product = new Product($naam, $prijs_small, $prijs_large);
        foreach($samenstelling as $i_naam){
            $ingredient = IngredientDao::addIngredient($mgr, $product, $i_naam);
            $product->AddIngredient($ingredient);
        }
        $mgr->persist($product);
        $mgr->flush();
        return $product;
    }
    public function deleteProduct($mgr, $product){
        $mgr->remove($product);
        $mgr->flush();
    }
    public function updateProduct($mgr, $id, $naam, $samenstelling, $prijs_small, $prijs_large, $promoprijs){
        $product = ProductDao::getByValue($mgr, $id);
        $product->setNaam($naam);
        $product->setSamenstelling($samenstelling);
        $product->setPrijs_Small($prijs_small);
        $product->setPrijs_Large($prijs_large);
        $product->setPromoprijs($promoprijs);
        $mgr->persist($product);
        $mgr->flush();
        return $product;
    }
}

