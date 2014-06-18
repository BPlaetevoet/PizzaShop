<?php
//Plaats.php

namespace Pizzashop\Entities;
/**
* @Entity
* @Table(name="plaats",
* uniqueConstraints={@UniqueConstraint(name="gemeente_unique", columns={"gemeente"})},
* indexes={@Index(name="gemeente_idx", columns={"gemeente"})})
*/
class Plaats{
    /**
* @id
* @Column(type="integer", unique=true, nullable=false)
* @GeneratedValue
*/
    protected $id;

    /** @Column(type="integer", length=4,name="postcode")*/
    protected $postcode;
    /** @Column(type="string", length=32, name="gemeente")*/
    protected $gemeente;
}

