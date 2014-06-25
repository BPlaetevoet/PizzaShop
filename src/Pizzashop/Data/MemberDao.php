<?php
//MemberDao.php
namespace Pizzashop\Data;

use Pizzashop\Entities\Member;

class MemberDao{
    public function getById($mgr, $id){
        $member = $mgr->getRepository('Pizzashop\\Entities\\Member')->find($id);
        return $member;
    }
    public function getByMail($mgr, $mail){
        $member = $mgr->getRepository('Pizzashop\\Entities\\Member')->findOneByMail($mail);
        if(!$member){
            return NULL;
        }else{
            return $member;
        }
    }
    public function login($mgr, $mail, $password){
        $login = $mgr->getRepository('Pizzashop\\Entities\\Member')->findOneBy(array('mail'=>$mail, 'password'=>$password));
        if($login){
            return $login;
        }else{
            return NULL;
        }
    }
    public function addMember($mgr, $mail, $password, $klant){
        $member = new Member($mail, $password, $klant);
        $mgr->persist($member);
        $mgr->flush();
        return $member;
    }
    public function updateMember($mgr, $id, $naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr, $mail, $password){
        $member = MemberDao::getById($mgr, $id);
        $member->setNaam($naam);
        $member->setVoornaam($voornaam);
        $member ->setStraat($straat);
        $member->setNr($nr);
        $member->setBus($bus);
        $member->setPlaats($plaats);
        $member->setTelefoonnr($telefoonnr);
        $member->setMail($mail);
        $member->setPassword($password);
        $mgr->persist($member);
        $mgr->flush();
        return $member;
    }
}

