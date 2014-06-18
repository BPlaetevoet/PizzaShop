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
     * $OneToMany(TargetEntity="Ingredient", mappedBy="Product", cascade={"ALL"})
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
}
