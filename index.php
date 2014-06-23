<?php
session_start();

require_once 'bootstrap.php';
use Pizzashop\Business\PlaatsService;
use Pizzashop\Business\ProductService;
use Pizzashop\Business\MemberService;

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
            $lijst = ProductService::getPromos($mgr);
            $twigDataArray["lijst"] = $lijst;
     }
$twigDataArray["active_page"]=$page;
if (isset($_SESSION["cartItems"])){
    $countItems = 0;
    $totaal = 0;
    $cartItems = array();
    foreach ($_SESSION["cartItems"] as $item=>$key){
    $product = ProductService::getById($mgr, $item);
    foreach($key as $size=>$aantal){
        
        $countItems += 1*$aantal;
            if ($size === "small"){ $prijs = $product->getPrijs_Small(); }
            if ($size === "large"){ $prijs = $product->getPrijs_Large(); }
            $totaal += $prijs*$aantal;
            array_push($cartItems, array($product, $size, $aantal, $prijs*$aantal));
        }
    }
    $twigDataArray["countItems"]=$countItems;
    $twigDataArray["cartItems"] = $cartItems;
    $twigDataArray["totaal"] = $totaal;
}
$plaatslijst = PlaatsService::getAll($mgr);
$twigDataArray["plaatslijst"] = $plaatslijst;
// Maak de pagina aan
$view = $twig->render("$page.twig", $twigDataArray);
print $view;

