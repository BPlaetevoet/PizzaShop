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

$plaatslijst = (new PlaatsService)->getAll($mgr); // dropdown keuzes vullen voor plaatsen
$twigDataArray['plaatslijst'] = $plaatslijst;

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $errors = array(); // array voor de lege velden en foutmeldingen
    $fields = array(); // een array aanmaken om de reeds ingevulde velden terug mee te geven

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
            $plaats = (new PlaatsService)->getById($mgr, $_POST['plaats']);
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
            $num_length = strlen((string)$telefoonnr);
            if ($num_length ==10 || $num_length == 9){
                $fields['telefoonnr']= $telefoonnr;
            } else {
                $errors['telefoonnr'] = "Enkel 9cijfers voor vaste nummers of 10 voor mobiele toegelaten.";
            }
            
        }
    }
    
    if($option=='register'){ //extra velden nodig bij registratie members controleren
        if(empty($_POST['mail'])){ 
            $errors['mail'] = 'e-mail niet ingevuld';
        }else{
            $mail = validate($_POST['mail']);
            $fields['mail']=$mail;
            $memberexists = (new MemberService)->getByMail($mgr, $mail);
            if($memberexists){
                $errors['mail'] = 'Dit mailadres bestaat al in ons systeem';
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
        $twigDataArray['option'] = $option;
    }
   
    if (empty($errors)){ // Geen errors ga verder met registratie
        if($page=="registreer") {
            $klant = (new KlantService)->addKlant($mgr, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr);
            $member = (new MemberService)->addMember($mgr, $mail, md5($password), $klant);
            if($member){ // registratie gelukt 
                setcookie('pizzashop_cookie', $mail, 0);
                $_SESSION['login'] = $member->getId();
            }  
        }
        if(isset($option)){
            switch ($option){
                 case "wijzig" :
                    $id = validate($_POST["id"]);
                    $klant = (new KlantService)->UpdateKlant($mgr, $_POST["id"], $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr);
                    $twigDataArray['klant']= $klant;
                    $twigDataArray['success']="wijziging";
                break;
                 case "new" :
                    $klant = (new KlantService)->addKlant($mgr, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr);
                        if($klant){ // klantgegevens opslaan gelukt
                            $twigDataArray['klant'] = $klant;
                            $_SESSION["klant"] = $klant->getId();
                        }
                        break;
                        
                    }
                }
            }
        }
