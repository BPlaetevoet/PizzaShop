<?php
//Bestelling.php

namespace Pizzashop\Entities;

use Doctrine\Common\Collections\ArrayCollection;
/**
* @Entity
* @Table(name="bestellingen")
*/
class Bestelling{
    /**
    * @Id
    * @Column(type="integer")
    * @GeneratedValue(strategy="AUTO")
    */
    protected $id;
    /**
    * @ManyToOne(targetEntity="Klant")
    * @JoinColumn(name="klant_id", referencedColumnName="id")
    */
    protected $user_id;
    /**
    * @Column(type="float", name="bedrag", nullable=true)
    */
    protected $bedrag;
    /**
    * @Column(type="datetime", name="b_datum")
    */
    protected $b_datum;
    /**
    * @var ArrayCollection
    * @OneToMany(targetEntity="BestelItem", mappedBy="bestelling", cascade={"ALL"})
    */
    protected $items;
    
    public function __create($user_id){
        $this->user_id = $user_id;
        $this->b_datum = new \DateTime('NOW');
        $this->items = new ArrayCollection();
    }
    public function getId(){
        return $this->id;
    }
    public function getUser_Id(){
        return $this->user_id;
    }
    public function getBedrag(){
        return $this->bedrag;
    }
    public function getB_Datum(){
        return $this->b_datum;
    }
    public function getItems(){
        return $this->items->to_array();
    }
    public function getItem($item){
        return $this->items[$item];
    }
    public function addItem(bestelItem $item){
        $this->items[] = $item;
    }
    public function setUser_Id($user_id){
        $this->user_id = $user_id;
    }
    public function setBedrag($bedrag){
        $this->bedrag = $bedrag;
    }
    public function setItems($items){
        $this->items = new ArrayCollection();
    }
    
}
