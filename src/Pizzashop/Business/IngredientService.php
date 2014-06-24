<?php
//ingredientService.php
namespace Pizzashop\Business;

use Pizzashop\Data\IngredientDao;

class IngredientService{
    public function getAll($mgr){
        $lijst = IngredientDao::getAll($mgr);
        return $lijst;
    }
    public function getById($mgr, $id){
        $ingredient = IngredientDao::getById($mgr, $id);
        return $ingredient;
    }
}

