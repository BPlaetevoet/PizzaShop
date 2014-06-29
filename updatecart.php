<?php
//UpdateCart.php
session_start();

require_once 'bootstrap.php';

if (isset($_GET["action"])){
    
    if(!isset($_SESSION["cartItems"])){
        $_SESSION["cartItems"]= array();
    }
    if ($_GET["action"]=="add"){
        $pizza = $_POST["pizza"];
        $_SESSION["cartItems"][$pizza]["aantal"] ++ ;
        $_SESSION["cartItems"][$pizza]["prijs"]= $_POST["prijs"];
        header("location: ".$_SERVER['HTTP_REFERER']);
        }
    if ($_GET["action"]=="remove"){
        $pizza = $_GET["pizza"];
        $_SESSION["cartItems"][$pizza]["aantal"] --;
        if ($_SESSION["cartItems"][$pizza]["aantal"]==0){
            unset($_SESSION["cartItems"][$pizza]);
        }
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
}
if (isset($_GET["reset"])&& $_GET["reset"]== "1"){
    unset($_SESSION["cartItems"]);
    header("location: index.php");
}

