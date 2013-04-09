<?php

class ForexColumn extends Nette\Object {

    private $id;
    private $code;
    private $currency;
    private $exchangeRate;
    private $roundDphWith;
    private $roundDphNo;
    private $cnbDate;

    function __construct($id, $code, $currency, $exchangeRate, $roundDphWith, $roundDphNo, $cnbDate) {
        $this->id = $id;
        $this->code = $code;
        $this->currency = $currency;
        $this->exchangeRate = $exchangeRate;
        $this->roundDphWith = $roundDphWith;
        $this->roundDphNo = $roundDphNo;
        $this->cnbDate = $cnbDate;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = (int) $id;
        return $this;
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
        $this->roundDphNo = (int) $roundDphNo;
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

?>