<?php
//Plaats.php

namespace Pizzashop\Entities;
/**
* @Entity
* @Table(name="plaats",
* uniqueConstraints={@UniqueConstraint(name="gemeente_unique", columns={"gemeente"})},
* indexes={@Index(name="gemeente_idx", columns={"gemeente"})})
*/
class Plaats{
/**
* @id
* @Column(type="integer", unique=true, nullable=false)
* @GeneratedValue
*/
    private $id;

    /** @Column(type="integer", length=4,name="postcode")*/
    private $postcode;
    /** @Column(type="string", length=32, name="gemeente")*/
    private $gemeente;
    
    public function __construct($postcode, $gemeente){
        $this->postcode = $postcode;
        $this->gemeente = $gemeente;
    }
    public function getId(){
        return $this->id;
    }
    public function getPostcode(){
        return $this->postcode;
    }
    public function getGemeente(){
        return $this->gemeente;
    }
    public function setPostcode($postcode){
        $this->postcode = $postcode;
    }
    public function setGemeente($gemeente){
        $this->gemeente = $gemeente;
    }
}

