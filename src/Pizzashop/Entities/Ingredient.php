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
    protected $product_id;
    /**
     * @Column(type="string", length=32)
     */
    protected $ingred;
}

