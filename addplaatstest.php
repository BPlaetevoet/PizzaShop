<?php

require_once 'bootstrap.php';
use Doctrine\Common\Util\Debug;
use Doctrine\Common\Collections\Criteria;
use Pizzashop\Entities\Plaats;
use Pizzashop\Data\PlaatsDao;
use Pizzashop\Business\IngredientService;
use Pizzashop\Business\PlaatsService;
$ingredientNaam = "salami";
$ingredient = $mgr->getRepository('Pizzashop\\Entities\\Ingredient')->findOneBy(array('i_naam'=>$ingredientNaam));
print '<pre>';
Debug::dump($ingredient);
print '</pre>';
$pizzas = $ingredient->getProduct();
//
//$criteria = Criteria::create()->where(Criteria::expr()->in("samenstelling", $ingredient));
//$lijst = $mgr->getRepository('Pizzashop\\Entities\\Product')->findAll()->matching($criteria);

print '<pre>';
Debug::dump($pizzas);
print '</pre>';


//$postcode = 8904;
//$gemeente = "Boezinge";
//$plaats = PlaatsService::addPlaats($mgr, $postcode, $gemeente);
//var_dump($plaats);