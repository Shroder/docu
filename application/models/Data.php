<?php

abstract class Data {
    protected $_id;
    protected $_rev;
    protected $title;
    protected $displayTitle;
    protected $publishDate;
    protected $status;
    
    public function __construct($id) {
        $this->_id = $id;
    }
}