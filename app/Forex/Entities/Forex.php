<?php

namespace Forex\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="forex")
 */
class Forex extends \Nette\Object {
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="string", unique=true, length=5)
     */
    private $code;
    
    /** @ORM\Column(type="string", length=5) */
    private $currency;
    
    /** @ORM\Column(type="decimal", precision=10, scale=3) */
    private $exchangeRate;
    
    /** @ORM\Column(type="integer") */
    private $roundDphWith;
    
    /** @ORM\Column(type="integer") */
    private $roundDphWithout;
    
    /** @ORM\Column(type="string") */
    private $cnbDate;
    
    public function format($number) {
        return $number / $this->exchangeRate;
    }

    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
        return $this;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
        return $this;
    }

    public function getExchangeRate() {
        return $this->exchangeRate;
    }

    public function setExchangeRate($exchangeRate) {
        $this->exchangeRate = (double) $exchangeRate;
        return $this;
    }

    public function getRoundDphWith() {
        return $this->roundDphWith;
    }

    public function setRoundDphWith($roundDphWith) {
        $this->roundDphWith = (int) $roundDphWith;
        return $this;
    }

    public function getRoundDphNo() {
        return $this->roundDphNo;
    }

    public function setRoundDphNo($roundDphNo) {
        $this->roundDphNo = (int)$roundDphNo;
        return $this;
    }

    public function getCnbDate() {
        return $this->cnbDate;
    }

    public function setCnbDate($cnbDate) {
        $this->cnbDate = $cnbDate;
        return $this;
    }

}
