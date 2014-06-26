<?php
// Promo.php
namespace Pizzashop\Entities;

/**
 * 
 * @Entity
 * @Table(name="promos")
 */
class Promo {
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
     * 
     * @Column(type="float", name="promoprijs", nullable=false)
     */
    protected $promoprijs;
    /**
     * @Column(type="date", name="b_datum", nullable=false)
     */
    protected $begindatum;
    /**
     * @Column(type="date", name="e_datum", nullable=false)
     */
    protected $einddatum;
    
    public function __construct($product, $promoprijs, $begindatum, $einddatum){
        $this->product = $product;
        $this->promoprijs = $promoprijs;
        $this->begindatum = $begindatum;
        $this->einddatum = $einddatum;
    }
    public function getProduct(){
        return $this->product;
    }
    public function getBegindatum(){
        return $this->begindatum;
    }
    public function getEinddatum(){
        return $this->einddatum;
    }
    public function getPromoprijs(){
        return $this->promoprijs;
    }
    public function setProduct($product){
        $this->product = $product;
    }
    public function setBegindatum($begindatum){
        $this->begindatum = $begindatum;
    }
    public function setEinddatum($einddatum){
        $this->einddatum = $einddatum;
    }
    public function setPromoprijs($promoprijs){
        $this->promoprijs = $promoprijs;
    }
    
}
