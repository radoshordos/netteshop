<?php

namespace Forex;

class ForexManagerFactory extends \Nette\Object {

    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    
    public function create(){
        $manager = new ForexManager;
        
    foreach ($this->entityManager->getRepository("Forex\Entities\Forex")->fetchAll() as $key => $value) {
            
        }
        $manager->addFormat($formater);
    }

}