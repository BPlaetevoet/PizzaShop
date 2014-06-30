<?php
require_once 'bootstrap.php';

use Pizzashop\Business\KlantService;
use Doctrine\Common\Util\Debug;

$id = 4;
$straat = "kwakkelstraat";

$klant = (new KlantService)->getById($mgr, $id);
print '<pre>';
Debug::dump($klant);
print '</pre>';
$klant->setStraat($straat);
$mgr->persist($klant);
print '<pre>';
Debug::dump($klant);
print '</pre>';
$mgr->flush();
  

