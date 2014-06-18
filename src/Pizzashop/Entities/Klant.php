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
    
    public function __construct($naam, $voornaam, $straat, $nr, $plaats, $telefoonnr){
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->straat = $straat;
        $this->nr = $nr;
        $this->plaats = $plaats;
        $this->telefoonnr = $telefoonnr;
    }
    public function getId(){
        return $this->id;
    }
    public function getNaam(){
        return $this->naam;
    }
    public function getVoornaam(){
        return $this->voornaam;
    }
    public function getStraat(){
        return $this->straat;
    }
    public function getNr(){
        return $this->nr;
    }
    public function getPlaats(){
        return $this->plaats;
    }
    public function getTelefoonnr(){
        return $this->telefoonnr;
    }
    public function setNaam($naam){
        $this->naam = $naam;
    }
    public function setVoornaam($voornaam){
        $this->voornaam = $voornaam;
    }
    public function setStraat($straat){
        $this->straat = $straat;
    }
    public function setNr($nr){
        $this->nr = $nr;
    }
    public function setPlaats($plaats){
        $this->plaats = $plaats;
    }
    public function setTelefoonnr($telefoonnr){
        $this->telefoonnr = $telefoonnr;
    }
    
}

