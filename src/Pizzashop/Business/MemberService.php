<?php
//MemberService.php
namespace Pizzashop\Business;

use Pizzashop\Data\MemberDao;

class MemberService{
    public function getById($mgr, $id){
        $member = MemberDao::getById($mgr, $id);
        return $member;
    }
    public function getByMail($mgr, $mail){
        $member = MemberDao::getByMail($mgr, $mail);
        return $member;
    }
    public function login($mgr, $mail, $password){
        $member = MemberDao::login($mgr, $mail, $password);
        return $member;
    }
    public function addMember($mgr, $mail, $password, $klant){
        $member = MemberDao::addMember($mgr, $mail, $password, $klant);
        return $member;
    }
    public function updateMember($mgr, $id, $naam, $voornaam, $straat, $nr, $plaats, $telefoonnr, $mail, $password){
        $member = MemberDao::updateMember($mgr, $id, $naam, $voornaam, $straat, $nr, $plaats, $telefoonnr, $mail, $password);
        return $member;
    }
}

