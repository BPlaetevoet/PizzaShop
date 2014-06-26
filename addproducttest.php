<?php

require_once 'bootstrap.php';
use Pizzashop\Entities\Promo;
use Pizzashop\Entities\Product;
use Pizzashop\Data\ProductDao;
use Pizzashop\Business\ProductService;
use Doctrine\Common\Util\Debug;
$pizzas = ProductDao::getAll($mgr);
$lijst = array();
$today = new DateTime('NOW');
foreach($pizzas as $pizza){
    $item = array(
        'id'=>$pizza->getId(), 
        'naam'=>$pizza->getNaam(),
        'samenstelling'=>array($pizza->getSamenstelling()),
        );
    foreach($pizza->getPromo() as $promotie){
    if ($today > $promotie->getBegindatum() && $today < $promotie->getEinddatum()){
        $item['prijs']= $promotie->getPromoprijs();
        $item['promo']= true;
    }else{
        $item['promo']= false;
        $item['prijs']= $pizza->getPrijs();
    }
    }
//    print '<pre>';
//    Debug::dump($item);
//    print '</pre><br><br>';
    array_push($lijst, $item);
}

print $lijst[3]['id'];
foreach($lijst[3]['samenstelling'] as $key => $value){
    print '<pre>';
    Debug::dump ($value);
    print '</pre>';
    print '<br>';
    foreach($value as $ingredient){
    print $ingredient->getI_Naam();
    print '<br>';
    }
}
//$pizzapromo = $pizzas->getPromo();
//foreach($pizzapromo as $promo){
//print $promo->getPromoprijs();
//}
//$pizza = ProductDao::getAllAndPromos($mgr);
//$query = $mgr->createQuery("select  p, b.promoprijs as prijs from Pizzashop\\Entities\\Product p JOIN Pizzashop\\Entities\\Promo b WHERE p.id = b.product");
//$lijst = $query->getResult();
print '<pre>';
Debug::dump($lijst);
print '</pre>';

//
//$naam = "Hawai";
//$prijs = 11;
//$prijs = 16.5;
//$samenstelling = array("gegrilde kip", "ananas", "ham");
//$pizza = ProductService::addProduct($mgr, $naam, $prijs, $samenstelling);
// Debug::dump($pizza);