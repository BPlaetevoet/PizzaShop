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
    $klant = (new KlantService)->getById($mgr, $_SESSION["klant"]);
    $bestelling = (new BestelService)->addBestelling($mgr, $klant, $items);
    if($bestelling){
        // Bestelling gelukt doorverwijzen naar bevestigingspagina
        unset($_SESSION["cartItems"]);
        header('location: index.php?page=bedankt&order='.$bestelling->getId());
    }else{
        // Er ging iets fout
    }

}else{
    header('location: index.php');
}



