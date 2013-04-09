<?php

namespace EshopModule;

class TreePresenter extends BasePresenter {

    /** @persistent */
    public $tree;

    /** @var \Nette\Database\Connection */
    private $connection;

    public function injectConnection(\Nette\Database\Connection $connection) {
        $this->connection = $connection;
        $this->autoCanonicalize = false;
    }

    public function renderDefault() {
        $this->template->tree = $this->tree;
    }

}