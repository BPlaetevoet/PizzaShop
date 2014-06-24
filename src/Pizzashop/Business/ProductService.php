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
    public function getByIngredient($mgr, $ingredient){
        $lijst = ProductDao::getByIngredient($mgr, $ingredient);
        return $lijst;
    }
    public function addProduct($mgr, $naam, $prijs, $samenstelling){
        $product = ProductDao::addProduct($mgr, $naam, $prijs, $samenstelling);
        return $product;
    }
    public function deleteProduct($mgr, $product){
        ProductDao::deleteProduct($mgr, $product);
    }
    public function updateProduct($mgr, $id, $naam, $samenstelling, $prijs){
        $product = ProductDao::updateProduct($mgr, $id, $naam, $samenstelling, $prijs);
        return $product;
    }
}
