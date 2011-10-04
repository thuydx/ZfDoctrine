<?php
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
            'ZfDoctrine\EntityManagerFactory' => array(
                'parameters' => array(
                    'pdo' => 'doctrine-pdo',
                ),
            ),
        ),
    ),
);
