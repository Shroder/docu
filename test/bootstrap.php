<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'testing'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    realpath(APPLICATION_PATH . '/controllers'),
    realpath(APPLICATION_PATH . '/models'),
    get_include_path()
)));
/*
 * Not sure how Zend loader works in this environment (being outside of Zend framework). 
 * I'm creating a custom loader until Zend loader can be configured to load needed classes.
require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance();
 * 
 */
function autoloader($class) {
    require_once $class.".php";
}
spl_autoload_register("autoloader");