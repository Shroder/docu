<?php

class Article extends Content {
    protected $author;
    protected $body;
    protected $categories;
    
    public function __construct() {
        $this->categories['Economic Development']['Sustainable Communities'] = array();
    }
    
    public function getCategories() {
        
    }
}