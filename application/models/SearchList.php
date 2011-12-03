<?php

class SearchList extends ContentList {
    private $_criteria;
    
    public function __construct() {
        $this->_criteria = array(
            "domain"  => null,
            "section" => new ContentList()
        );
    }
    
    public function setSections(array $sections) {
        foreach ($sections as $section) {
            /**
             * @todo Check for existing sections
             */
            $this->_criteria['sections'][] = $section;
        }
    }
}

?>
