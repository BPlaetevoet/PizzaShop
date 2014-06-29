<?php
//ingredientService.php
namespace Pizzashop\Business;

use Pizzashop\Data\IngredientDao;

class IngredientService{
    public function getAll($mgr){
        $lijst = (new IngredientDao)->getAll($mgr);
        return $lijst;
    }
    public function getByName($mgr, $name){
        $ingredient = (new IngredientDao)->getByName($mgr, $name);
        return $ingredient;
    }
    public function getById($mgr, $id){
        $ingredient = (new IngredientDao)->getById($mgr, $id);
        return $ingredient;
    }
}

