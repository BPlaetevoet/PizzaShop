<?php
//Member.php

namespace Pizzashop\Entities;
/**
 * @Entity
 * @Table(name="members")
 */
class Member extends Klant {
    /**
    * @id
    * @Column(type="integer", unique=true, nullable=false)
    * @GeneratedValue(strategy="AUTO")
    */
    protected $id;
    /**
    * @Column(type="string", length=32, name="email")
    */
    protected $mail;
    /**
    * @Column(type="string", length=32, name="password")
    */
    protected $password;
    /**
     * @Column(type="boolean")
     */
    protected $specialprice;
    
    public function __construct($naam, $voornaam, $straat, $nr, $plaats, $telefoonnr, $mail, $password) {
        parent::__construct($naam, $voornaam, $straat, $nr, $plaats, $telefoonnr);
        $this->mail = $mail;
        $this->password = $password;
    }
    private function getPassword(){
        return $this->password;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getSpecialprice(){
        return $this->specialprice;
    }
    private function setPassword($password){
        $this->password = md5($password);
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setSpecialprice($specialprice){
        $this->specialprice = $specialprice;
    }
}

