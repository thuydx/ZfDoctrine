<?php

namespace ZfDoctrine;

use PDO,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Tools\Setup;


class EntityManagerFactory
{
    public static function createFromPdo(PDO $pdo)
    {
        $isDevMode = true;
        $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
        $conn = array('pdo' => $pdo);
        $em = EntityManager::create($conn, $config);
        return $em;
    }
}
