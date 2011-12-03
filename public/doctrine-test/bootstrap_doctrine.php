<?php
use Doctrine\ORM\Tools\Setup;
require_once "Doctrine/ORM/Tools/Setup.php";
require_once "Doctrine/DBAL/Logging/SQLLogger.php";
require_once "Doctrine/DBAL/Logging/EchoSQLLogger.php";

Setup::registerAutoloadPEAR();

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ApcCache,
    Entities\Article;

require_once 'Doctrine/Common/ClassLoader.php';

// Set up class loading. You could use different autoloaders, provided by your favorite framework,
// if you want to.
$classLoader = new ClassLoader('Doctrine\ORM', realpath(__DIR__ . '/../../lib'));
$classLoader->register();
$classLoader = new ClassLoader('Doctrine\DBAL', realpath(__DIR__ . '/../../lib/vendor/doctrine-dbal/lib'));
$classLoader->register();
$classLoader = new ClassLoader('Doctrine\Common', realpath(__DIR__ . '/../../lib/vendor/doctrine-common/lib'));
$classLoader->register();
$classLoader = new ClassLoader('Symfony', realpath(__DIR__ . '/../../lib/vendor'));
$classLoader->register();
$classLoader = new ClassLoader('Entities', __DIR__);
$classLoader->register();
$classLoader = new ClassLoader('Proxies', __DIR__);
$classLoader->register();
$classLoader = new ClassLoader("DoctrineExtensions", "../library/DoctrineExtensions");
$classLoader->register();

$isDevMode = true;
/*
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/entities"), $isDevMode);
 * 
 */
$config = new Configuration;
$cache = new ApcCache;
$config->setMetadataCacheImpl($cache);
$driverImpl = $config->newDefaultAnnotationDriver(array(__DIR__."/Entities"));
$config->setMetadataDriverImpl($driverImpl);
$config->setQueryCacheImpl($cache);

// Proxy configuration
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);

$logger = new \Doctrine\DBAL\Logging\EchoSQLLogger();
$config->setSQLLogger($logger);
$conn = array(
    'driver'   => 'pdo_mysql',
    'path'     => '127.0.0.1',
    'dbname'   => 'doctrine',
    'user'     => 'dbuser',
    'password' => 'ch33z883'
);

$entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);