<?php

require_once 'bootstrap.php';

use Pizzashop\ValidationController;
use Pizzashop\Business\GastenboekService;

define('MY_EMAIL', 'bart.plaetevoet@telenet.be');
define('EMAIL_SUBJECT', 'pizzashop contact-formulier');
if(isset($_POST["page"])){
    $page = ValidationController::validate($_POST["page"]);
}
if(isset($_POST["naam"])&&(!empty($_POST["naam"]))){
    $naam = ValidationController::validate($_POST["naam"]);
}else{ $errors["naam"]= 1; }
if(isset($_POST["mail"])&&(!empty($_POST["mail"]))){
    $mail = ValidationController::validate($_POST["mail"]);
}else{ $errors["mail"]=1;}
if(isset($_POST["boodschap"])&&(!empty($_POST["boodschap"]))){
    $boodschap = ValidationController::validate($_POST["boodschap"]);
}else{ $errors["boodschap"]=1;}

if(!empty($errors)){
    if($page=="contact"){ header('location: index.php?page=contact&error=contact');
    }elseif($page=="gastenboek"){ header('location: index.php?page=gastenboek&error=gastenboek');
    }
}
if(empty($errors)){
    if($page=="contact"){
        $messagebody = $naam. "stuurde u volgend bericht via de Pizzashop \n".$boodschap;
        if(mail(MY_EMAIL, EMAIL_SUBJECT, $messagebody, "from: $mail")){
            header('location: index.php?page=contact&succes=1');
        }else{
            header('HTTP 1.1/400 : Er ging iets fout');
        }
    } 
    if($page=="gastenboek"){
        $entry = GastenboekService::addEntry($mgr, $naam, $mail, $boodschap);
        if($entry){
            header('location: index.php?page=gastenboek&succes=1');
        }else{
            header('location: index.php?page=gastenboek&error=gastenboek');
        }
    }
}

