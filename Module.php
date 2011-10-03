<?php

namespace ZfDoctrine;

use Zend\Module\Manager,
    Doctrine\ORM\Tools\Setup as DoctrineSetup;

class Module
{
    public function init(Manager $moduleManager)
    {
        $this->initAutoloader();
    }

    public function initAutoloader()
    {
        require __DIR__ . '/vendor/doctrine2/lib/Doctrine/ORM/Tools/Setup.php';
        DoctrineSetup::registerAutoloadGit(__DIR__ . '/vendor/doctrine2');
    }
}
