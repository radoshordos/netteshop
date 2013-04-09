<?php

/**
 * Router factory.
 */
class EshopRoute extends \Nette\Application\Routers\Route {

    /** @var \Nette\Database\Connection */
    private $connection;

    public function __construct(\Nette\Database\Connection $connection) {
        $this->connection = $connection;

        parent::__construct("<slug .+>", array(
            'presenter' => 'Default',
            'slug' => array(
                self::VALUE => '',
                self::FILTER_IN => NULL,
                self::FILTER_OUT => NULL,
            )
        ));
    }

    public function match(\Nette\Http\IRequest $httpRequest) {
        $httpRequest = parent::match($httpRequest);

        $slug = $httpRequest->parameters['slug'];
        $tree = $this->getTable()->where('tree_abs_path = ?', $slug . '/')->fetch();

        if (!$tree) {
            return NULL;
        }

        $httpRequest->setPresenterName('Eshop:Tree');
        $httpRequest->setParameters(array(
            'action' => 'default',
            'tree' => $tree,
        ));

        return $httpRequest;
    }

    public function constructUrl(\Nette\Application\Request $appRequest, \Nette\Http\Url $refUrl) {
        if ($appRequest->getParameters() !== 'Eshop:Tree') {
            return NULL;
        }

        $parameters = $appRequest->parameters;
        $tree = $parameters['tree'];
        /* if(!$tree){
          return NULL;
          } */
        unset($parameters['tree']);
        $parameters['slug'] = trim($tree->tree_abs_path, '/');

        $appRequest->setParameters($parameters);
        $appRequest->setPresenterName('Default');

        return parent::constructUrl($appRequest, $refUrl);
    }

    private function getTable() {
        return $this->connection->table('view2tree2');
    }

}
