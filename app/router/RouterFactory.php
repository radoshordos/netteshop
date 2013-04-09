<?php

use Nette\Application\Routers\RouteList,
    Nette\Application\Routers\Route;

/**
 * Router factory.
 */
class RouterFactory {

    private $eshopRoute;

    public function setEshopRoute($eshopRoute) {
        $this->eshopRoute = $eshopRoute;
    }

    /**
     * @return Nette\Application\IRouter
     */
    public function createRouter() {
        $router = new RouteList();
        $router[] = new Route('index.php', 'Homepage:default', Route::ONE_WAY);
        $router[] = $this->eshopRoute;
        $router[] = new Route('export/<action>.xml', array(
            'module' => 'Export',
            'presenter' => 'Default',
        ));
        $router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
        return $router;
    }

}
