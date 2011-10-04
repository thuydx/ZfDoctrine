<?php

namespace ZfDoctrine;

use PDO,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Tools\Setup;


class EntityManagerFactory
{
    public static function createFromPdo($pdo)
    {
        if (!$pdo instanceof PDO) {
            throw new \InvalidArgumentException('You must inject a configured PDO object via the "doctrine-pdo" DI alias.');
        }
        $isDevMode = true;
        $config = Setup::createXMLMetadataConfiguration(array(), $isDevMode);
        $conn = array('pdo' => $pdo);
        $em = EntityManager::create($conn, $config);
        return $em;
    }
}
