<?php
//Bestelling.php

namespace Pizzashop\Entities;

use Doctrine\Common\Collections\ArrayCollection;
/**
* @Entity
* @Table(name="bestellingen")
* @HasLifecycleCallbacks
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
    protected $klant;
    /**
    * @Column(type="float", name="bedrag", nullable=true)
    */
    protected $bedrag;
    /**
    * @PrePersist
    * @Column(type="datetime", name="b_datum", options={"default"="CURRENT_TIMESTAMP"})
    */
    protected $b_datum;
    /** @PrePersist */
    public function OnPrePersist(){
        $this->b_datum = new \DateTime('NOW');
    }
    /**
    * @var ArrayCollection
    * @OneToMany(targetEntity="BestelItem", mappedBy="bestelling", cascade={"ALL"})
    */
    protected $items;
    
    
    public function __construct($klant){
        $this->klant = $klant;
        $this->items = new ArrayCollection();
    }
    public function getId(){
        return $this->id;
    }
    public function getklant(){
        return $this->klant;
    }
    public function getBedrag(){
        return $this->bedrag;
    }
    public function getB_Datum(){
        return $this->b_datum;
    }
    public function getItems(){
        return $this->items;
    }
    public function getItem($item){
        return $this->items[$item];
    }
    public function addItem(bestelItem $item){
        $this->items[] = $item;
    }
    public function setklant($klant){
        $this->klant = $klant;
    }
    public function setBedrag($bedrag){
        $this->bedrag = $bedrag;
    }
    public function setB_Datum(){
        $this->b_datum = new \DateTime('NOW');
    }
    public function setItems($items){
        $this->items = new ArrayCollection();
    }
    
}
