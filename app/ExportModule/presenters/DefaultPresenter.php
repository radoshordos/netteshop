<?php

namespace ExportModule;

class DefaultPresenter extends BasePresenter {

    /** @persistent */
    public $code;

    /** @var \Nette\Database\Connection */
    private $connection;

    /** @var \Forex\ForexManager */
    private $forexManager;

    public function injectConnection(\Nette\Database\Connection $connection) {
        $this->connection = $connection;
    }

    public function injectForexManager(\Forex\ForexManager $forexManager) {
        $this->forexManager = $forexManager;
    }
    
    
    protected function startup() {
        parent::startup();
        
        if ($this->code) {
            $this->forexManager->setCurrentCode($this->code);
        }
    }

    
    public function getForexManager() {
        return $this->forexManager;
    }

    
    public function getProducts() {
        return $this->connection->table('view2prod2')->limit('50');
    }

    public function getTreeProducts() {
        // FETCH COL potřebuji
        return $this->connection->table('view2tree2', array("tree_id"))->where('td_id_topdivision = 20');
    }

}