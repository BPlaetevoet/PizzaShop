<?php
session_start();
require_once 'bootstrap.php';

use Pizzashop\ValidationController;
use Pizzashop\Business\MemberService;

if(isset($_GET["actie"])&& $_GET["actie"]=="uitloggen"){
    unset($_SESSION["login"]);
    header('location:'.$_SERVER['HTTP_REFERER']);
}
if(isset($_GET["actie"])&& $_GET["actie"]== "inloggen"){
    $mail = ValidationController::validate($_POST['mail']);
    $password = ValidationController::validate($_POST['password']);
    if($mail && $password){
        $login = MemberService::login($mgr, $mail, md5($password));
        if ($login){
            if (isset($_SESSION['loginerror'])){
                unset($_SESSION['loginerror']);
            }
            $_SESSION['login']=$login->getId();
            setcookie('pizzashop_cookie', $mail, time()+3600*24*30);
        }else {
            $_SESSION['loginerror']='verkeerde combinatie mail/password';
        }
        header('location: '.$_SERVER['HTTP_REFERER']);
        
    }
}
