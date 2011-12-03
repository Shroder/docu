<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initConfig()
    {
        $config = new Zend_Config($this->getOptions());
        Zend_Registry::set('config', $config);
        return $config;
    }
    
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }
    
    protected function _initRoutes()
    {
        $valid_chars = 'a-z0-9\'"_():;+=';
        $router = Zend_Controller_Front::getInstance()->getRouter();        

        $route = new Zend_Controller_Router_Route_Regex(
            '(['.$valid_chars.']*)/?(['.$valid_chars.']*?)',
            array(
                'module' => 'default',
                'controller' => 'Index',
                'action' => 'index'),                
            array('pageName' => 1, 'action' => 2),
            '%s/%s'
        );
        $router->addRoute('wp', $route);
    }

}

