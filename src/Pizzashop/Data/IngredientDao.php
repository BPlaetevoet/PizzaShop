<?php
//IngredientDao.php
namespace Pizzashop\Data;

use Pizzashop\Entities\Ingredient;

class IngredientDao{
    public function getAll($mgr){
        $query =  $mgr->createQuery('select distinct i.i_naam from Pizzashop\\Entities\\Ingredient i');
        $lijst = $query->getResult();
        return $lijst;
                
    }
    public function getById($mgr, $id){
        $ingredient = $mgr->getRepository('Pizzashop\\Entities\\Ingredient')->find($id);
        return $ingredient;
    }
    public static function addIngredient($mgr, $product, $i_naam){
        $ingredient = new Ingredient($product, $i_naam);
        $mgr->persist($ingredient);
        $mgr->flush();
        return $ingredient;
    }
}

