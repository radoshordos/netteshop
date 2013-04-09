<?php

namespace Forex;

class ForexManager extends \Nette\Object {

    private $entityManager;
    private $currentCode;
    private $formater;
    private $defaultCode;
    private $defaultCurrency;
    private $defaultExcahngeRate;
    private $defaultRoundDPHWith;
    private $defaultRoundDPHWithout;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager, $defaultCode = "CZK", $defaultCurrency = "Kč", $defaultExchangeRate = 1, $defaultRoundDPHWith = 0, $defaultRoundDPHWithout = 2) {
        $this->entityManager = $entityManager;
        $this->defaultCode = $defaultCode;
        $this->defaultCurrency = $defaultCurrency;
        $this->defaultExcahngeRate = $defaultExchangeRate;
        $this->defaultRoundDPHWith = $defaultRoundDPHWith;
        $this->defaultRoundDPHWithout = $defaultRoundDPHWithout;
        
        $this->formater = new Entities\Forex;
        $this->formater->setExchangeRate($this->defaultExcahngeRate);
    }

    public function format($number) {
        return $this->formater->format($number);
    }

    public function setCurrentCode($currentCode) {
        $this->currentCode = $currentCode;

        $this->formater = $this->entityManager->getRepository("Forex\Entities\Forex")->findOneBy(array("code" => $currentCode));
    }

    public function getCurrentCode() {
        return $this->currentCode;
    }

}