<?php
session_start();

require_once 'bootstrap.php';
use Pizzashop\Business\PlaatsService;
use Pizzashop\Business\ProductService;
use Pizzashop\Business\MemberService;
use Pizzashop\Business\IngredientService;
use Pizzashop\Business\PromoService;


use Doctrine\Common\Util\Debug;
// Controleer of er reeds een cookie bestaat om dit te grbuiken in de formulieren
if(isset($_COOKIE['pizzashop_cookie'])){
    $twigDataArray['cookie']=$_COOKIE['pizzashop_cookie'];
}
// SESSION login
if(isset($_SESSION['login'])){
    $member = MemberService::getById($mgr, $_SESSION['login']);
    $twigDataArray["login"]= TRUE;
    $twigDataArray["klant"]= $member->getKlant();
    $_SESSION["klant"] = $member->getklant()->getId();
}
if (isset($_SESSION["loginerror"])){ // problemen bij het inloggen opvangen en terug meegeven in dataArray
    $twigDataArray["loginerror"]=$_SESSION['loginerror'];
}
$page = "home"; 


if (isset($_GET["page"])){
    $page = $_GET["page"];
}
 switch ($page){
        case "pizzas" :
            $pizzas = ProductService::getAll($mgr);
            $lijst = array();
            $today = new DateTime('NOW');
            foreach($pizzas as $pizza){
                $item = array(
                    'id'=>$pizza->getId(), 
                    'naam'=>$pizza->getNaam(),
                    'samenstelling'=>array($pizza->getSamenstelling()),
                    'prijs'=>$pizza->getPrijs(),
                    'promo'=>false
                    );
                foreach($pizza->getPromo() as $promotie){
                    if ($today > $promotie->getBegindatum() && $today < $promotie->getEinddatum()){
                        $item['prijs']= $promotie->getPromoprijs();
                        $item['promo']= true;
                    }
                }
                    print '<pre>';
    Debug::dump($item);
    print '</pre><br><br>';
                array_push($lijst, $item);
            }
//            $promolijst = PromoService::getHuidigePromos($mgr);
  //          $lijst = ProductService::getAll($mgr);
//            $twigDataArray["promolijst"] = $promolijst;
            $twigDataArray["lijst"] = $lijst;
            
//            print "<pre>";
//            Debug::dump($lijst);
//            print '</pre>';
        break;
        case "promoties" :
            $promosverwacht = PromoService::getVerwachtePromos($mgr);
            $lijst = PromoService::getHuidigePromos($mgr);
            $twigDataArray["promosverwacht"] = $promosverwacht;
            $twigDataArray["promolijst"] = $lijst;
        case "registreer" : 
            include 'formcontroller.php';
        case "afrekenen" :
            if (isset($_GET["option"])){
                $twigDataArray['option'] = $_GET["option"];
                include 'formcontroller.php';
            }
        break;
        case "home" :
            $bestellijst = Pizzashop\Business\BestelItemService::getPopularItems($mgr);
            $twigDataArray['bestellijst']=$bestellijst;
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
