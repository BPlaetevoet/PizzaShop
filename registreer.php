<?php
session_start();

require_once 'bootstrap.php';

use Pizzashop\Entities\Member;
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

$form = array('naam'=>'text', 
    'voornaam'=> 'text',
    'straat'=> 'text',
    'nr'=> 'number',
    'bus'=> 'text',
    'plaats'=> 'select',
    'telefoonnr'=> 'integer',
    'mail'=> 'email',
    'password'=> 'password');

$rowfields = array('nr', 'bus'); // velden die niet over de volle breedte moeten getoond worden

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $errors = array(); // array voor de lege velden 
    if(empty($_POST['naam'])){
        $errors['naam'] = 'naam is niet ingevuld';
    }else{
        $naam = validate($_POST['naam']);
    }
    if(empty($_POST['voornaam'])){
        $errors['voornaam']= 'voornaam is niet ingevuld';
    }else{
        $voornaam = validate($_POST['voornaam']);
    }
    if(empty($_POST['straat'])){
        $errors['straat']= 'straat is niet ingevuld';
    }else{
        $straat = validate($_POST['straat']);
    }
    if(empty($_POST['nr'])){
        $errors['nr'] = 'nr is niet ingevuld';
    }else{
        if(is_numeric($_POST['nr'])){
            $nr = validate($_POST['nr']);
        }
    }
    if(empty($_POST['bus'])){
        $bus = null;
    }else{
        $bus = validate($_POST['bus']);
    }
    if(empty($_POST['plaats'])){
        $errors['plaats'] = 'geen gemeente gekozen';
    }else{
        if(is_numeric($_POST['plaats'])){
            $plaats = PlaatsService::getById($mgr, $_POST['plaats']);
        }
    }
    if(empty($_POST['telefoonnr'])){
        $errors['telefoonnr'] = 'telefoonnr is niet ingevuld';
    }else{
        if(!is_numeric($_POST['telefoonnr'])){
            $errors['telefoonnr'] = 'enkel cijfers toegelaten bv.:051010203';
        }else{
            $telefoonnr = validate($_POST['telefoonnr']);
        }
    }
    if(empty($_POST['mail'])){
        $errors['mail'] = 'e-mail niet ingevuld';
    }else{
        $mail = validate($_POST['mail']);
        if(MemberService::getByMail($mgr,$mail)){
            $errors['mail'] = 'E-mail niet uniek';
        }
    }
    if(empty($_POST['password'])){
        $errors['password'] = 'password niet ingevuld';
    }else{
        $password = validate($_POST['password']);
    }

    if (!empty($errors)){ // keer terug met fouten !!
        $fields = array(); // een array aanmaken om de reeds ingevlude velden terug mee te geven 
        foreach($form as $field=>$value){   
            if(!empty($_POST[$field])){   //Velden die niet leeg zijn worden toegevoegd aan de array en terug meegegeven aan twig
                $fields[$field] = $_POST[$field];
            }
        }
        $view = $twig->render('registreer.twig', array('form'=>$form, 'rowfields'=>$rowfields, 'plaatslijst'=>$plaatslijst, 'errors'=>$errors, 'fields'=>$fields));
        print $view;
        print '<pre>';
        print_r($errors);
        print '<br><br>';
        print_r($fields);
        print '<br><br>';
        print_r($naam);
        print '</pre>';
    }
    if (empty($errors)){ // Geen errors = member toevoegen
        $member = MemberService::addMember($mgr, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr, $mail, md5($password));
        if($member){ // registratie gelukt 
            setcookie('pizzashop_cookie', $mail, 0);
            $_SESSION['login'] = $member->getId();
            $view = $twig->render('registreer.twig', array('login'=>$member));
            print $view;
        }else{
            $view = $twig->render('registreer.twig', array('error'=>'E-mail adres is al geregistreerd'));
        }
    }
}else {
    $view = $twig->render('registreer.twig', array('form'=>$form, 'rowfields'=>$rowfields, 'plaatslijst'=>$plaatslijst));
    print $view;
}
