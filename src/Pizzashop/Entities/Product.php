<?php
// Product.php
namespace Pizzashop\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="products")
 */
class Product{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @Column(type="string", length=32, unique=true, nullable=false)
     * 
     */
    protected $naam;
    /**
     * @var ArrayCollection
     * @OneToMany(targetEntity="Ingredient", mappedBy="product", cascade={"persist"})
     */
    protected $samenstelling;
    /**
     * @Column(type="float", name="prijs_small", nullable=false)
     */
    protected $prijs_small;
     /**
     * @Column(type="float", name="prijs_large", nullable=false)
     */
    protected $prijs_large;
    /**
     * @Column(type="float", name="promoprijs", nullable=true)
     */
    protected $promoprijs;
    
    
    public function __construct($naam, $prijs_small, $prijs_large){
        $this->naam = $naam;
        $this->prijs_small = $prijs_small;
        $this->prijs_large = $prijs_large;
        $this->samenstelling = new ArrayCollection();
    }
    public function getId(){
        return $this->id;
    }
    public function getNaam(){
        return $this->naam;
    }
    public function getSamenstelling(){
        return $this->samenstelling->toArray();
    }
    public function getIngredient($ingredient){
        return $this->samenstelling[$ingredient];
    }
    public function addIngredient(ingredient $ingredient){
        $this->samenstelling[] = $ingredient;
    }
    public function getPrijs_Small(){
        return $this->prijs_small;
    }
    public function getPrijs_Large(){
        return $this->prijs_large;
    }
    public function getPromoprijs(){
        return $this->promoprijs;
    }
    public function setNaam($naam){
        $this->naam = $naam;
    }
    public function setSamenstelling($samenstelling){
        $this->samenstelling = new ArrayCollection();
    }
    public function setPrijs_Small($prijs_small){
        $this->prijs_small = $prijs_small;
    }
    public function setPrijs_Large($prijs_large){
        $this->prijs_large = $prijs_large;
    }
    public function setPromoprijs($promoprijs){
        $this->promoprijs = $promoprijs;
    }
}
