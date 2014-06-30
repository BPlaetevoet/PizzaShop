<?php
session_start();

require_once 'bootstrap.php';
use Pizzashop\Business\PlaatsService;
use Pizzashop\Business\ProductService;
use Pizzashop\Business\MemberService;
use Pizzashop\Business\IngredientService;
use Pizzashop\Business\PromoService;
use Pizzashop\Business\KlantService;
use Pizzashop\Business\BestelService;
use Pizzashop\Business\GastenboekService;


use Doctrine\Common\Util\Debug;
// Controleer of er reeds een cookie bestaat om dit te grbuiken in de formulieren
if(isset($_COOKIE['pizzashop_cookie'])){
    $twigDataArray['cookie']=$_COOKIE['pizzashop_cookie'];
}
// SESSION login
if(isset($_SESSION['login'])){
    $member = (new MemberService)->getById($mgr, $_SESSION['login']);
    $twigDataArray["login"]= TRUE;
    $twigDataArray["klant"]= $member->getKlant();
    $_SESSION["klant"] = $member->getklant()->getId();
}
if (isset($_SESSION['klant'])){
    $twigDataArray['klant']=(new KlantService)->getById($mgr, $_SESSION["klant"]);
   
}
if (isset($_SESSION["loginerror"])){ // problemen bij het inloggen opvangen en terug meegeven in dataArray
    $twigDataArray["loginerror"]=$_SESSION['loginerror'];
}
$page = "home"; 
// errors opvangen en meegeven
if(isset($_GET["error"])){
    $twigDataArray["error"]= $_GET["error"];
}
// succes opvangen en meegeven
if (isset($_GET["succes"])){
    $twigDataArray["succes"]= $_GET["succes"];
}
if (isset($_GET["page"])){
    $page = $_GET["page"];
}
 switch ($page){
        case "pizzas" :
            $lijst = (new ProductService)->getCurrentLijst($mgr);
            $twigDataArray["lijst"] = $lijst;
        break;
        case "promoties" :
            $promosverwacht = (new PromoService)->getVerwachtePromos($mgr);
            $lijst = (new PromoService)->getHuidigePromos($mgr);
            $twigDataArray["promosverwacht"] = $promosverwacht;
            $twigDataArray["promolijst"] = $lijst;
        break;
        case "gastenboek" :
            $gblijst = (new GastenboekService)->getAll($mgr);
            $twigDataArray["gblijst"]=$gblijst;
        break;
        case "registreer" : 
            if (isset($_GET["option"])){
                $option = validate($_GET["option"]);
            }
            include 'FormController.php';
        break;
        case "afrekenen" :
            if (isset($_GET["option"])){
                $option = (new \Pizzashop\ValidationController)->validate($_GET["option"]);
                $twigDataArray['option'] = $option;
                include 'FormController.php';      
            }
        break;
        case "bedankt" :
            if(isset($_GET["order"])){
                $bestelling = (new BestelService)->getById($mgr, $_GET["order"]);
                $twigDataArray["bestelling"] = $bestelling;
            }
            if (isset($_GET["fout"]) && ($_GET["fout"]==1)){
                if (isset($_GET["klant"])){
                    $klantId = $_GET["klant"];
                    $klant = (new KlantService)->getById($mgr, $klantId);
                    $twigDataArray["klant"]= $klant;
                }
                $twigDataArray["fout"]="E-mail adres is al geregistreerd";
            }
        break;
        case "home" :
            $gblijst = (new GastenboekService)->getLatestEntrys($mgr);
            $promolijst = (new PromoService)->getHuidigePromos($mgr);
            $bestellijst = (new \Pizzashop\Business\BestelItemService)->getPopularItems($mgr);
            $twigDataArray["gblijst"] = $gblijst;
            $twigDataArray['bestellijst']=$bestellijst;
            $twigDataArray['promolijst']=$promolijst;
     }

$twigDataArray["active_page"]=$page;
if (isset($_SESSION["cartItems"])){
    $countItems = 0;
    $totaal = 0;
    $cartItems = array();
    foreach ($_SESSION["cartItems"] as $item => $value){      
        $product = (new ProductService)->getById($mgr, $item);
        $countItems += 1*$value["aantal"];
        $prijs = $value["prijs"];
        $aantal = $value["aantal"];
        $totaal += $prijs*$aantal;
        array_push($cartItems, array($product, $aantal, $prijs*$aantal));
    }
    $twigDataArray["countItems"]=$countItems;
    $twigDataArray["cartItems"] = $cartItems;
    $twigDataArray["totaal"] = $totaal;
}
if (isset($_GET['ingredient'])){
    $ingredient = htmlspecialchars($_GET['ingredient']);
    $lijst = (new ProductService)->getByIngredient($mgr, $ingredient);
    $twigDataArray['lijst'] = $lijst;
}
$ingredientlijst = (new IngredientService)->getAll($mgr);
$twigDataArray["ingredientlijst"] = $ingredientlijst;
$plaatslijst = (new PlaatsService)->getAll($mgr);
$twigDataArray["plaatslijst"] = $plaatslijst;
// Maak de pagina aan
$view = $twig->render("$page.twig", $twigDataArray);
print $view;