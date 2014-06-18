<?php
//MemberService.php
namespace Pizzashop\Business;

use Pizzashop\Data\MemberDao;

class MemberService{
    public function getById($mgr, $id){
        $member = MemberDao::getById($mgr, $id);
        return $member;
    }
    public function addMember($mgr, $naam, $voornaam, $straat, $nr, $plaats, $telefoonnr, $mail, $password){
        $member = MemberDao::addMember($mgr, $naam, $voornaam, $straat, $nr, $plaats, $telefoonnr, $mail, $password);
        return $member;
    }
    public function updateMember($mgr, $id, $naam, $voornaam, $straat, $nr, $plaats, $telefoonnr, $mail, $password){
        $member = MemberDao::updateMember($mgr, $id, $naam, $voornaam, $straat, $nr, $plaats, $telefoonnr, $mail, $password);
        return $member;
    }
}

