<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Collection
 *
 * @author josterholt
 */
class Collection implements ArrayAccess, Iterator {
    private $container = array();
    protected $param1;

    public function push($obj, $val) {
        $this->container[] = array($obj, $val);
    }
    
    public function __call($name, $arguments) {
        echo "Call $name\n";
        die();
    }
    
    public function __get($name) {
        echo "Get $name\n";
        return $this->$name;
    }
    
    public function __set($name, $value) {
        echo "Set $name\n";
        die();
    }

    public function rewind() {
        echo "rewinding\n";
        reset($this->var);
    }
    
    public function current() {
        $var = current($this->var);
        echo "current: $var\n";
        return $var; 
    }

    public function key() {
        $var = key($this->var);
        if (is_object($var) && method_exists($var, "__toString")) {
            return $var->__toString();
        }
        return $var;
    }
    
    public function next() {
        $var = next($this->var);
        echo "next: $var\n";
        return $var;
    }
    
    public function valid() {
        $key = key($this->var);
        $var = ($key !== NULL && $key !== FALSE);
        echo "valid: $var\n";
        return $var;    
    }
    

    public function offsetSet($offset, $value) {
        $set = array("key" => $offset, "value" => $value);
        if (is_numeric($offset)) {
            array_splice($set, $offset, 0);
        }
        else
        {
            $this->container[] = $set;
        }
    }
    
    public function offsetExists($offset) {
        return isset($this->container[$offset]['value']);
    }
    
    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }
    
    public function offsetGet($offset) {
        return isset($this->container[$offset]['value']) ? $this->container[$offset]['value'] : null;
    }
}

?>
