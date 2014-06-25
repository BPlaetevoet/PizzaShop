<?php
session_start();
/*plaatsbestelling.php
*
* Bestellingen verwerken en toevoegen in db
*/
require_once 'bootstrap.php';

use Pizzashop\Business\BestelService;
use Pizzashop\Business\KlantService;
use Doctrine\Common\Util\Debug;

if (isset($_SESSION["klant"])&&(isset($_SESSION["cartItems"]))){
    $items = $_SESSION["cartItems"];
    $klant = KlantService::getById($mgr, $_SESSION["klant"]);
    $bestelling = BestelService::addBestelling($mgr, $klant, $items);
    if($bestelling){
        // Bestelling gelukt doorverwijzen naar bevestigingspagina
        unset($_SESSION["cartItems"]);
        header('location: index.php?page=bedankt');
    }else{
        // Er ging iets fout
    }
//    Debug::dump($klant);
}else{
    header('location: index.php');
    
}



