<?php

require_once 'bootstrap.php';

use Pizzashop\Entities\Product;
use Pizzashop\Data\ProductDao;
use Pizzashop\Business\ProductService;
use Doctrine\Common\Util\Debug;

$naam = "Frutti di Mare";
$prijs_small = 9.5;
$prijs_large = 16.5;
$samenstelling = array("zeevruchten", "ajuin");
$pizza = ProductService::addProduct($mgr, $naam, $prijs_small, $prijs_large, $samenstelling);
Debug::dump($pizza);