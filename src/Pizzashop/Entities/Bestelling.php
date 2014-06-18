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
    /**
     * @Column(type="float", name="BTW")
     */
    protected $btw;
}
