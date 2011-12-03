<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */       

    }

    public function indexAction()
    {
        if (strpos($this->url, '.html') !== true) {
            $this->view->contentList = $this->section->getContentList();
        }
    }
    
    public function testAction()
    {
        
    }


}

