<?php

namespace ExportModule;

class DefaultPresenter extends BasePresenter {

    /** @var \Nette\Database\Connection */
    private $connection;

    public function injectConnection(\Nette\Database\Connection $connection) {
        $this->connection = $connection;
    }

    public function getProducts() {
        return $this->connection->table('view2prod1')->limit('50');
    }

    public function getTreeProducts() {
        // FETCH COL potřebuji
        return $this->connection->table('view2tree1', array("tree_id"))->where('td_id_topdivision = 20');
    }
    
    

}