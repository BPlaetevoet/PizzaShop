<?php
// Klant.php
namespace Pizzashop\Entities;

/**
 * @Entity
 * @Table(name="klanten")
 */
class Klant{
    /**
    * @id
    * @Column(type="integer", unique=true, nullable=false)
    * @GeneratedValue(strategy="AUTO")
    */
    protected $id;
    /**
    * @Column(type="string", length=32, name="naam")
    */
    protected $naam;
    /**
    * @Column(type="string", length=32, name="voornaam")
    */
    protected $voornaam;
    
    /**
    * @Column(type="string", length=52, name="straat")
    */
    protected $straat;
    /**
     * @Column(type="string", length=7, name="nr")
     */
    protected $nr;
    /**
    * @ManyToOne(targetEntity="Plaats")
    * @ORM\JoinColumn(name="plaats_id", referencedColumnName="id")
    */
    protected $plaats;
    /**
     * @Column(type="integer", name="telefoonnr")
     */
    protected $telefoonnr;
    
}

