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
     * @OneToMany(targetEntity="Ingredient", mappedBy="product", cascade={"ALL"})
     */
    protected $samenstelling;
    /**
     * @Column(type="float", name="prijs", nullable=false)
     */
    protected $prijs;
    /**
     * @Column(type="float", name="promoprijs", nullable=true)
     */
    protected $promoprijs;
    
    public function __construct($naam, $prijs){
        $this->naam = $naam;
        $this->prijs = $prijs;
        $this->samenstelling = new ArrayCollection();
    }
    public function getId(){
        return $this->id;
    }
    public function getNaam(){
        return $this->naam;
    }
    public function getSamenstelling(){
        return $this->samenstelling->to_array();
    }
    public function getIngredient($ingredient){
        return $this->samenstelling[$ingredient];
    }
    public function getPrijs(){
        return $this->prijs;
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
    public function setPrijs($prijs){
        $this->prijs = $prijs;
    }
    public function setPromoprijs($promoprijs){
        $this->promoprijs = $promoprijs;
    }
}
