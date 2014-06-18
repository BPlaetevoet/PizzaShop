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
    protected $productId;
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
    
}