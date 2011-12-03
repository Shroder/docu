.<?php
/**
 * Content list is intended to be the standard list object.
 */
class ContentList implements ArrayAccess {
    /**
     *
     * @todo Change this to protected if extensions will be manipulating this.
     * ContentLists are meant to be handled like arrays, so there shouldn't be
     * anything too fancy.
     */
    private $_list = array();
    
    public function __construct(&$list = array()) {
        $this->_list = $list;
    }
    
    public function getContent($index) {
        return $this->_list[$index];
    }

    public function getContentList() {
        return $this->_list;
    }
    
    public function offsetExists($offset) {
        
    }
    
    public function offsetGet($offset) {
        
    }
    
    public function offsetSet($offset, $value) {
        
    }
    
    public function offsetUnset($offset) {
        
    }
    
    public function setList($list) {
        $this->_list = $list;
    }
}
