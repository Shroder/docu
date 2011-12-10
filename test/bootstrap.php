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
    realpath(APPLICATION_PATH . '/../library/Smarty'),
    realpath(APPLICATION_PATH . '/../library/Smarty/plugins'),
    realpath(APPLICATION_PATH . '/../library/Smarty/sysplugins'),
    realpath(APPLICATION_PATH . '/controllers'),
    realpath(APPLICATION_PATH . '/models'),
    get_include_path()
)));

define('SMARTY_DIR', APPLICATION_PATH.'/../library/Smarty/');

/*
 * Not sure how Zend loader works in this environment (being outside of Zend framework).
 * I'm creating a custom loader until Zend loader can be configured to load needed classes.
require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance();
 *
 */
function autoloader($class)
{
    foreach (explode(PATH_SEPARATOR, get_include_path()) as $path)
    {
        $className = $class.".php";
        //echo realpath($path.DIRECTORY_SEPARATOR.$className)."\n";
        
        if (file_exists($path.DIRECTORY_SEPARATOR.$className))
        {
            require_once($path.DIRECTORY_SEPARATOR.$className);
        }
        
        if (file_exists($path.DIRECTORY_SEPARATOR.strtolower($className)))
        {
            require_once($path.DIRECTORY_SEPARATOR.strtolower($className));
        }        
    }
    if (!class_exists($class))
    {
        require "class.$class.php";
    }
}
spl_autoload_register("autoloader"); 