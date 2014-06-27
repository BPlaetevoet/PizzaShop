<?php
session_start();
require_once 'bootstrap.php';

use Pizzashop\ValidationController;
use Pizzashop\Business\MemberService;
use Pizzashop\Business\KlantService;

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
if (isset($_GET["actie"]) && ($_GET["actie"]=="registreer")){
                $klant = KlantService::getById($mgr, $_POST["id"]);
                $mail = ValidationController::validate($_POST["mail"]);
                $password = ValidationController::validate($_POST["password"]);
                $member = MemberService::addMember($mgr, $mail, md5($password), $klant);
            if($member){ // registratie gelukt 
                setcookie('pizzashop_cookie', $mail, 0);
                $_SESSION['login'] = $member->getId();
                header('location: index.php?page=login');
            }else{
                $klant = $klant->getId();
                header('location: index.php?page=bedankt&klant='.$klant.'&fout=1');
                }  
            }
