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
     * @ManyToOne(targetEntity="Product", inversedBy="samenstelling")
     * @JoinColumn(name="product_id", nullable=false, onDelete="CASCADE", referencedColumnName="id")
     */
    protected $product;
    /**
     * @Column(type="string", length=32)
     */
    protected $i_naam;
    
    public function __construct($product, $i_naam){
        $this->i_naam = $i_naam;
        $this->product = $product;
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
    public function setProduct($product){
        $this->product = $product;
    }
    public function setI_Naam($i_naam){
        $this->i_naam = $i_naam;
    }
    
}

