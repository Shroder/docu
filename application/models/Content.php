<?php

abstract class Content {
    protected $_id;
    protected $_rev;
    protected $title;
    protected $displayTitle;
    protected $publishDate;
    protected $status;
    protected $sections;
    
    public function __construct($id) {
        $this->_id = $id;
    }
}