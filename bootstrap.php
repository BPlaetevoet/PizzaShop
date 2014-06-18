<?php

/* 
 * Bootstrap.php file
 * manage connections with doctrine
 */

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

//referentie naar autoloader aangemaakt door composer
require_once 'vendor/autoload.php';

$isDevMode = true;
$paths = array(__DIR__.'/src/PizzaShop/Entities/',__DIR__.'/src/Pizzashop/Business/');
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$loader = new Twig_Loader_Filesystem('src/Pizzashop/Presentation');
$twig = new Twig_Environment($loader);
/* SQL logger */
// $Logger = new Doctrine\DBAL\Logging\EchoSQLLogger();
// $config->setSQLLogger($logger);

$conn = array(
    'driver'=>'pdo_mysql',
    'user'=>'cursusgebruiker',
    'password'=>'cursuspwd',
    'dbname'=>'pizzashop',
);

// Maak de Entitymanager aan

$mgr = EntityManager::create($conn, $config);