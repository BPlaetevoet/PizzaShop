<?php
// Ingredient.php
namespace Pizzashop\Entities;

/**
 * @Entity
 * @Table(name="ingredients")
 */
class Ingredient{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ManyToMany(targetEntity="Product", inversedBy="samenstelling")
     */
    protected $product;
    /**
     * @Column(type="string", length=32)
     */
    protected $i_naam;
    
    public function __construct($i_naam){
        $this->i_naam = $i_naam;
    }
    public function getId(){
        return $this->id;
    }
    public function getProduct(){
        return $this->product;
    }
    public function getI_Naam(){
        return $this->i_naam;
    }
    public function addProduct(product $product){
        if(!$this->product->contains($product)){
            $this->product->add($product);
        }
        return $this;
    }
    public function setProduct($product){
        $this->product = $product;
    }
    public function setI_Naam($i_naam){
        $this->i_naam = $i_naam;
    }
    
}

