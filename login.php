<?php
session_start();
require_once 'bootstrap.php';

use Pizzashop\ValidationController;
use Pizzashop\Business\MemberService;
use Pizzashop\Business\KlantService;
$validator = new ValidationController();
if(isset($_GET["actie"])&& $_GET["actie"]=="uitloggen"){
    unset($_SESSION["login"]);
    header('location:'.$_SERVER['HTTP_REFERER']);
}
if(isset($_GET["actie"])&& $_GET["actie"]== "inloggen"){
    $mail = $validator->validate($_POST['mail']);
    $password = $validator->validate($_POST['password']);
    if($mail && $password){
        $login = (new MemberService)->login($mgr, $mail, md5($password));
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
                $klant = (new KlantService)->getById($mgr, $_POST["id"]);
                $mail = $validator->validate($_POST["mail"]);
                $password = $validator->validate($_POST["password"]);
                $member = (new MemberService)->addMember($mgr, $mail, md5($password), $klant);
            if($member){ // registratie gelukt 
                setcookie('pizzashop_cookie', $mail, 0);
                $_SESSION['login'] = $member->getId();
                header('location: index.php?page=login');
            }else{
                $klant = $klant->getId();
                header('location: index.php?page=bedankt&klant='.$klant.'&fout=1');
                }  
            }
