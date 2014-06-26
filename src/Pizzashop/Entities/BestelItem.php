<?php
//BestelItem.php

namespace Pizzashop\Entities;

/**
 * @Entity
 * @Table(name="bestelitems")
 */
class BestelItem{
    /**
    * @Id
    * @Column(type="integer")
    * @GeneratedValue(strategy="AUTO")
    */
    protected $id;
    /**
    * @ManyToOne(targetEntity="Product")
    * @JoinColumn(name="product_id", referencedColumnName="id")
    */
    protected $product;
    /**
    * @ManyToOne(targetEntity="Bestelling", inversedBy="items")
    * @JoinColumn(name="order_id", nullable=false, onDelete="CASCADE", referencedColumnName="id")
    */
    protected $bestelling;
    /**
    * @Column(type="integer", name="aantal")
    */
    protected $aantal;
    /**
    * @Column(type="float", name="b_prijs")
    */
    protected $b_prijs;
    
    public function __construct($product, $aantal, $b_prijs, $bestelling){
        $this->product = $product;
        $this->aantal = $aantal;
        $this->b_prijs = $b_prijs;
        $this->bestelling = $bestelling;
    }
    public function getId(){
        return $this->id;
    }
    public function getProduct(){
        return $this->product;
    }
    public function getAantal(){
        return $this->aantal;
    }
    public function getB_Prijs(){
        return $this->b_prijs;
    }
    public function getBestelling(){
        return $this->bestelling;
    }
    public function setProduct($product){
        $this->product = $product;
    }
    public function setAantal($aantal){
        $this->aantal = $aantal;
    }
    public function setB_Prijs($b_prijs){
        $this->b_prijs = $b_prijs;
    }
}