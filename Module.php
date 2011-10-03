<?php

namespace ZfDoctrine;

use Zend\Module\Manager;

class Module
{
    public function init(Manager $moduleManager)
    {
        $this->initAutoloader();
    }

    public function initAutoloader()
    {
        require __DIR__ . '/vendor/doctrine2/lib/Doctrine/ORM/Tools/Setup.php';
        \Doctrine\ORM\Tools\Setup::registerAutoloadGit(__DIR__ . '/vendor/doctrine2');
    }
}
