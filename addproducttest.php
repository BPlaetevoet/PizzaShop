<?php

require_once 'bootstrap.php';
use Pizzashop\Entities\Promo;
use Pizzashop\Entities\Product;
use Pizzashop\Data\ProductDao;
use Pizzashop\Business\ProductService;
use Doctrine\Common\Util\Debug;

$pizza = ProductDao::getAllAndPromos($mgr);
print '<pre>';
Debug::dump($pizza);
print '</pre>';

//
//$naam = "Hawai";
//$prijs = 11;
//$prijs = 16.5;
//$samenstelling = array("gegrilde kip", "ananas", "ham");
//$pizza = ProductService::addProduct($mgr, $naam, $prijs, $samenstelling);
Debug::dump($pizza);