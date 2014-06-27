<?php
/* 
 * Gastenboek.php
 * 
 */

namespace Pizzashop\Entities;
/**
 * @Entity
 * @Table(name="gastenboek")
 * @HasLifecycleCallbacks
 */
class Gastenboek{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @Column(type="string", length=32, unique=false, nullable=false)
     */
    protected $naam;
    /**
     * @Column(type="string", length=32)
     */
    protected $mail;
    /**
     * @Column(type="text", nullable=false)
     */
    protected $boodschap;
    /**
     * @PrePersist
     * @Column(type="datetime", name="datum", nullable=false)
     */
    protected $datum;
    /** @PrePersist */
    public function OnPrePersist(){
        $this->datum = new \DateTime('NOW');
    }
    public function __construct($naam, $mail, $boodschap){
        $this->naam = $naam;
        $this->mail = $mail;
        $this->boodschap = $boodschap;
    }
    public function getId(){
        return $this->id;
    }
    public function getNaam(){
        return $this->naam;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getBoodschap(){
        return $this->boodschap;
    }
    public function getDatum(){
        return $this->datum;
    }
    public function setNaam($naam){
        $this->naam =$naam;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setBoodschap($boodschap){
        $this->boodschap = $boodschap;
    }
}


