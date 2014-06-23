<?php
//ProductService.php
namespace Pizzashop\Business;

use Pizzashop\Data\ProductDao;

class ProductService{
    public function getAll($mgr){
        $lijst = ProductDao::getAll($mgr);
        return $lijst;
    }
    public function getById($mgr, $id){
        $product = ProductDao::getById($mgr, $id);
        return $product;
    }
    public function getOneByValue($mgr, $value){
        $product = ProductDao::getOneByValue($mgr, $value);
        return $product;
    }
    public function getOrderedByValue($mgr, $value){
        $lijst = ProductDao::getOrderedByValue($mgr, $value);
        return $lijst;
    }
    public function addProduct($mgr, $naam, $prijs_small, $prijs_large, $samenstelling){
        $product = ProductDao::addProduct($mgr, $naam, $prijs_small, $prijs_large, $samenstelling);
        return $product;
    }
    public function deleteProduct($mgr, $product){
        ProductDao::deleteProduct($mgr, $product);
    }
    public function updateProduct($mgr, $id, $naam, $samenstelling, $prijs_small, $prijs_large, $promoprijs){
        $product = ProductDao::updateProduct($mgr, $id, $naam, $samenstelling, $prijs_small, $prijs_large, $promoprijs);
        return $product;
    }
}
