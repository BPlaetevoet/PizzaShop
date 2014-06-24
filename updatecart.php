<?php
//UpdateCart.php
session_start();

require_once 'bootstrap.php';
use Pizzashop\Business\ProductService;


if (isset($_GET["action"])&& (isset($_GET["pizza"]))){
    $pizza = htmlspecialchars($_GET["pizza"]);
    if(!isset($_SESSION["cartItems"])){
        $_SESSION["cartItems"]= array();
    }
    if ($_GET["action"]=="add"){
         $_SESSION["cartItems"][$pizza] ++ ;
        header("location: ".$_SERVER['HTTP_REFERER']);
        }
    if ($_GET["action"]=="remove"){
        $_SESSION["cartItems"][$pizza]--;
        if ($_SESSION["cartItems"][$pizza]==0){
            unset($_SESSION["cartItems"][$pizza]);
        }
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
}
if (isset($_GET["reset"])&& $_GET["reset"]== "1"){
    unset($_SESSION["cartItems"]);
    header("location: index.php");
}

