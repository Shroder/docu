<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$bits = explode('.', $_SERVER['HTTP_HOST']);
$domain = implode(".", array_slice($bits, (count($bits) - 2), 2));
$domain = strtolower($domain);

$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/'.$domain.'.ini'
);
$application->bootstrap()
            ->run();