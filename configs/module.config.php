<?php
$pdoOptions = array(
    'dsn'            => 'mysql:dbname=changeme;host=changeme',
    'username'       => 'changeme',
    'passwd'         => 'changeme',
    'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''),
);

return array(
    'di' => array( 
        'definitions' => array(
            'doctrine' => array(
                'class' => 'Zend\Di\Definition\BuilderDefinition',
                'Doctrine\ORM\EntityManager' => array(
                    'instantiator' => array('ZfDoctrine\EntityManagerFactory','createFromPdo'),
                ),
            ),
            'doctrineEntityManagerFactory' => array(
                'class' => 'Zend\Di\Definition\BuilderDefinition',
                'ZfDoctrine\EntityManagerFactory' => array(
                    'injectionmethods' => array(
                        'createFromPdo' => array(
                            'pdo' => 'PDO'
                        ),
                    ),
                ),
            ),
        ),
        'instance' => array(
            'PDO' => array(
                'parameters' => $pdoOptions,
            ),
            'ZfDoctrine\EntityManagerFactory' => array(
                'parameters' => array(
                    'pdo' => 'PDO',
                ),
            ),
        ),
    ),
);
