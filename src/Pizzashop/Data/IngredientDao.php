<?php
//IngredientDao.php
namespace Pizzashop\Data;

use Pizzashop\Entities\Ingredient;

class IngredientDao{
    public function getAll($mgr){
        $query =  $mgr->createQuery('select i.i_naam from Pizzashop\\Entities\\Ingredient i');
        $lijst = $query->getResult();
        return $lijst;
                
    }
    public function getById($mgr, $id){
        $ingredient = $mgr->getRepository('Pizzashop\\Entities\\Ingredient')->find($id);
        return $ingredient;
    }
    public function getByName($mgr, $name){
        $ingredient = $mgr->getRepository('Pizzashop\\Entities\\Ingredient')->findOneBy(array('i_naam'=>$name));
        if ($ingredient){
            return $ingredient;
        }else{ 
            return NULL; 
        }
    }
    public function addIngredient($mgr, $i_naam){
        $ingredientbestaat = (new IngredientDao)->getByName($mgr, $i_naam);
        if($ingredientbestaat){
            return $ingredientbestaat;
        }else{
            $ingredient = new Ingredient($i_naam);
            $mgr->persist($ingredient);
            $mgr->flush();
            return $ingredient;
        }   
    }
}

