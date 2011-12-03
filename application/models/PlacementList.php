<?php

class PlacementList extends ContentList {
    protected $section;
    
    public function __construct(&$section, &$list = array()) {
        parent::__construct(&$list);

        if (is_string($section)) {
            $this->section = new Section($section);
        } elseif ($section instanceof Section) {
            $this->section = &$section;
        } else {
            throw new Exception("Invalid section set");
        }
    }
}

?>
