<?php

class Module extends Content {
    protected $params;
    protected $template;
    
    public function __construct($title) {
        $this->title = $title;
    }
}

?>
