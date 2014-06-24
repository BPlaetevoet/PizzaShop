<?php
session_start();

require_once 'bootstrap.php';
use Pizzashop\Business\PlaatsService;
use Pizzashop\Business\ProductService;
use Pizzashop\Business\MemberService;
use Pizzashop\Business\IngredientService;

use Doctrine\Common\Util\Debug;
if(isset($_COOKIE['pizzashop_cookie'])){
    $twigDataArray['cookie']=$_COOKIE['pizzashop_cookie'];
}
if(isset($_SESSION['login'])){
    $twigDataArray['login']= MemberService::getById($mgr, $_SESSION['login']);
}
if (isset($_SESSION['loginerror'])){
    $twigDataArray['loginerror']=$_SESSION['loginerror'];
}
$page = "home"; 
if (isset($_GET["page"])){
    $page = $_GET["page"];
}
 switch ($page){
        case "pizzas" :
            $lijst = ProductService::getAll($mgr);
            $twigDataArray["lijst"] = $lijst;
        break;
        case "promoties" :
            $lijst = PromoService::getPromos($mgr);
            $twigDataArray["promolijst"] = $promolijst;
     }
$twigDataArray["active_page"]=$page;
if (isset($_SESSION["cartItems"])){
    $countItems = 0;
    $totaal = 0;
    $cartItems = array();
    foreach ($_SESSION["cartItems"] as $item=>$aantal){
        $product = ProductService::getById($mgr, $item);
        $countItems += 1*$aantal;
        $prijs = $product->getPrijs();
        $totaal += $prijs*$aantal;
        array_push($cartItems, array($product, $aantal, $prijs*$aantal));
    }
    $twigDataArray["countItems"]=$countItems;
    $twigDataArray["cartItems"] = $cartItems;
    $twigDataArray["totaal"] = $totaal;
}
if (isset($_GET['ingredient'])){
    $ingredient = htmlspecialchars($_GET['ingredient']);
    $lijst = ProductService::getByIngredient($mgr, $ingredient);
    $twigDataArray['lijst'] = $lijst;
}
$ingredientlijst = IngredientService::getAll($mgr);
$twigDataArray["ingredientlijst"] = $ingredientlijst;
$plaatslijst = PlaatsService::getAll($mgr);
$twigDataArray["plaatslijst"] = $plaatslijst;
// Maak de pagina aan
$view = $twig->render("$page.twig", $twigDataArray);
print $view;
