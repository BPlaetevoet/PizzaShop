<?php

use Pizzashop\Business\KlantService;
use Pizzashop\Business\MemberService;
use Pizzashop\Business\PlaatsService;
use Doctrine\Common\Util\Debug;

function validate($data){ // valideer data 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$plaatslijst = PlaatsService::getAll($mgr); // dropdown keuzes vullen voor plaatsen
$twigDataArray['plaatslijst'] = $plaatslijst;

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $errors = array(); // array voor de lege velden en foutmeldingen
    $fields = array(); // een array aanmaken om de reeds ingevulde velden terug mee te geven
    if (isset($_POST['page'])){
        $page = validate($_POST['page']);
    }
    if(empty($_POST['naam'])){
        $errors['naam'] = 'naam is niet ingevuld';
    }else{
        $naam = validate($_POST['naam']);
        $fields['naam'] = $naam;
    }
    if(empty($_POST['voornaam'])){
        $errors['voornaam']= 'voornaam is niet ingevuld';
    }else{
        $voornaam = validate($_POST['voornaam']);
        $fields['voornaam']= $voornaam;
    }
    if(empty($_POST['straat'])){
        $errors['straat']= 'straat is niet ingevuld';
    }else{
        $straat = validate($_POST['straat']);
        $fields['straat']= $straat;
    }
    if(empty($_POST['nr'])){
        $errors['nr'] = 'nr is niet ingevuld';
    }else{
        if(is_numeric($_POST['nr'])){
            $nr = validate($_POST['nr']);
            $fields['nr']=$nr;
        }
    }
    if(empty($_POST['bus'])){
        $bus = null;
    }else{
        $bus = validate($_POST['bus']);
        $fields['bus']= $bus;
    }
    if(empty($_POST['plaats'])){
        $errors['plaats'] = 'geen gemeente gekozen';
    }else{
        if(is_numeric($_POST['plaats'])){
            $plaats = PlaatsService::getById($mgr, $_POST['plaats']);
            $fields['plaats']= $plaats->getId();
        }
    }
    if(empty($_POST['telefoonnr'])){
        $errors['telefoonnr'] = 'telefoonnr is niet ingevuld';
    }else{
        if(!is_numeric($_POST['telefoonnr'])){
            $errors['telefoonnr'] = 'enkel cijfers toegelaten bv.:051010203';
        }else{
            $telefoonnr = validate($_POST['telefoonnr']);
            $fields['telefoonnr']= $telefoonnr;
        }
    }
    if($page=='registreer'){
        if(empty($_POST['mail'])){ 
            $errors['mail'] = 'e-mail niet ingevuld';
        }else{
            $mail = validate($_POST['mail']);
            $fields['mail']=$mail;
            if(MemberService::getByMail($mgr,$mail)){
                $errors['mail'] = 'E-mail niet uniek';
            }
        }
        if(empty($_POST['password'])){
            $errors['password'] = 'password niet ingevuld';
        }else{
            $password = validate($_POST['password']);
            $fields['password']=$password;
        }
    }

    if (!empty($errors)){ // keer terug met fouten !!
        $twigDataArray['errors'] = $errors;
        $twigDataArray['fields'] = $fields;
//        if($id == 'klant'){ 
            $twigDataArray['option'] = 'new';
//            $view = $twig->render("afrekenen.twig", $twigDataArray);
//        }else{
//            $view = $twig->render("registreer.twig", $twigDataArray);
//        }
//        print $view;
    }
    if (empty($errors)){ // Geen errors ga verder met registratie
        if($page=="afrekenen"){
            $klant = KlantService::addKlant($mgr, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr);
            if($klant){ // klantgegevens opslaan gelukt
                $twigDataArray['klant'] = $klant;
                $_SESSION["klant"] = $klant->getId();
//                $view = $twig->render("bevestigen.twig", array('klant'=>$klant));
//                print $view;
            }
        }elseif($page=="registreer") {
            $klant = KlantService::addKlant($mgr, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr);
            $member = MemberService::addMember($mgr, $mail, md5($password), $klant);
            if($member){ // registratie gelukt 
                setcookie('pizzashop_cookie', $mail, 0);
                $_SESSION['login'] = $member->getId();
//                $view = $twig->render('registreer.twig', array('login'=>$member));
//                print $view;
//            }else{
//                $view = $twig->render('registreer.twig', array('error'=>'E-mail adres is al geregistreerd'));
            }  
        }
        
    }
}

//}else {
//    $view = $twig->render('registreer.twig', array('plaatslijst'=>$plaatslijst));
//    print $view;
//}
