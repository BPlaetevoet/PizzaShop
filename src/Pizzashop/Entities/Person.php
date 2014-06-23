<?php
// Person.php
namespace Pizzashop\Entities;

abstract class Person{
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
     * @Column(type="integer", length=7, name="nr")
     */
    protected $nr;
    /**
    * @Column(type="string", length=5, name="bus", nullable=true)
    */
    protected $bus;
    /**
    * @ManyToOne(targetEntity="Plaats")
    * @JoinColumn(name="plaats_id", referencedColumnName="id")
    */
    protected $plaats;
    /**
     * @Column(type="integer", name="telefoonnr")
     */
    protected $telefoonnr;
    
    public function __construct($naam, $voornaam, $straat, $nr, $bus, $plaats, $telefoonnr){
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->straat = $straat;
        $this->nr = $nr;
        $this->bus = $bus;
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
    public function getBus(){
        return $this->bus;
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
    public function setBus($bus){
        $this->bus = $bus;
    }
    public function setPlaats($plaats){
        $this->plaats = $plaats;
    }
    public function setTelefoonnr($telefoonnr){
        $this->telefoonnr = $telefoonnr;
    }
    
}

