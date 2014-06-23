<?php

require_once 'bootstrap.php';

use Pizzashop\Entities\Plaats;
use Pizzashop\Data\PlaatsDao;
use Pizzashop\Business\PlaatsService;

$postcode = 8904;
$gemeente = "Boezinge";
$plaats = PlaatsService::addPlaats($mgr, $postcode, $gemeente);
var_dump($plaats);