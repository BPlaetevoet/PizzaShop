<?php
//ProductService.php
namespace Pizzashop\Business;

use Pizzashop\Data\ProductDao;

class ProductService{
    public function getAll($mgr){
        $lijst = (new ProductDao)->getAll($mgr);
        return $lijst;
    }
    public function getById($mgr, $id){
        $product = (new ProductDao)->getById($mgr, $id);
        return $product;
    }
    public function getOneByValue($mgr, $value){
        $product = (new ProductDao)->getOneByValue($mgr, $value);
        return $product;
    }
    public function getOrderedByValue($mgr, $value){
        $lijst = (new ProductDao)->getOrderedByValue($mgr, $value);
        return $lijst;
    }
    public function getByIngredient($mgr, $ingredient){
        $lijst = (new ProductDao)->getByIngredient($mgr, $ingredient);
        return $lijst;
    }
    public function addProduct($mgr, $naam, $prijs, $samenstelling){
        $product = (new ProductDao)->addProduct($mgr, $naam, $prijs, $samenstelling);
        return $product;
    }
    public function deleteProduct($mgr, $product){
        (new ProductDao)->deleteProduct($mgr, $product);
    }
    public function updateProduct($mgr, $id, $naam, $samenstelling, $prijs){
        $product = (new ProductDao)->updateProduct($mgr, $id, $naam, $samenstelling, $prijs);
        return $product;
    }
    public function getCurrentLijst($mgr){
        $lijst = (new ProductDao)->getCurrentLijst($mgr);
        return $lijst;
    }
}
