<?php
//Member.php

namespace Pizzashop\Entities;
/**
 * @Entity
 * @Table(name="members")
 */
class Member extends Klant {
    /**
    * @id
    * @Column(type="integer", unique=true, nullable=false)
    * @GeneratedValue(strategy="AUTO")
    */
    protected $id;
    /**
    * @Column(type="string", length=32, name="email")
    */
    protected $mail;
    /**
    * @Column(type="string", length=32, name="password")
    */
    protected $password;
}

