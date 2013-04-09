<?php

class Forex extends Nette\Object {

    public function __construct() {
        //     $forex = array();
    }

    public function useDefaultForex($key = 'CZK') {
        
    }

    public function fetchAll($res) {

        foreach ($res as $row) {
            $entry = new ForexColumn();
            $entry->setId($id)
                    ->setCode($code)
                    ->setCurrency($currency)
                    ->setExchangeRate($exchangeRate)
                    ->setRoundDphNo($roundDphNo)
                    ->setRoundDphWith($roundDphWith)
                    ->setCnbDate($cnbDate);

            $entries[] = $entry;
        }
        return $entries;
    }

}

?>