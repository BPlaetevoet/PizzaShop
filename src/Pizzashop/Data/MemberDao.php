<?php
//MemberDao.php
namespace Pizzashop\Data;

use Pizzashop\Entities\Member;

class MemberDao{
    public function getById($mgr, $id){
        $member = $mgr->getRepository('Pizzashop\\Entities\\Member')->find($id);
        return $member;
    }
    public function addMember($mgr, $naam, $voornaam, $straat, $nr, $plaats, $telefoonnr, $mail, $password){
        $member = new Member($naam, $voornaam, $straat, $nr, $plaats, $telefoonnr, $mail, $password);
        $mgr->persist($member);
        $mgr->flush();
        return $member;
    }
    public function updateMember($mgr, $id, $naam, $voornaam, $straat, $nr, $plaats, $telefoonnr, $mail, $password){
        $member = MemberDao::getById($mgr, $id);
        $member->setNaam($naam);
        $member->setVoornaam($voornaam);
        $member ->setStraat($straat);
        $member->setNr($nr);
        $member->setPlaats($plaats);
        $member->setTelefoonnr($telefoonnr);
        $member->setMail($mail);
        $member->setPassword($password);
        $mgr->persist($member);
        $mgr->flush();
        return $member;
    }
}

