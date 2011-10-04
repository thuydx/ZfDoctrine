<?php

namespace ZfDoctrine;

use Zend\Module\Manager,
    Doctrine\ORM\Tools\Setup as DoctrineSetup,
    Zend\Loader\AutoloaderFactory,
    Zend\Config\Config;

class Module
{
    public function init(Manager $moduleManager)
    {
        $this->initAutoloader();
    }

    public function initAutoloader()
    {
        AutoloaderFactory::factory(array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        ));
        require __DIR__ . '/vendor/doctrine2/lib/Doctrine/ORM/Tools/Setup.php';
        DoctrineSetup::registerAutoloadGit(__DIR__ . '/vendor/doctrine2');
    }

    public static function getConfig()
    {
        return new Config(include __DIR__ . '/configs/module.config.php');
    }
}
