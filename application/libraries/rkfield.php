<?php

class RKField {
    private $data = array();
    
    public function __construct($name, $type='text') {
        $this->data['name'] = $name;
        $this->data['type'] = $type;
    }
    
//    public function __set ($name, $value) {
//        $this->data[$name] = $value;
//        return $this;
//    }
    
    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
              return $this->data[$name];
        }
//        trigger_error(
//            sprintf("Undefined %s property via %s.__get", $name, __CLASS__)
//        );
        return null;
    }
    
    public function __call($name, $arguments) {
        $this->data[$name] = $arguments[0];
        return $this;
    }
    
    public function __isset($name) {
        return isset($this->data[$name]);
    }
    
    public function source($name) {
        $recs = Ref::by_name($name);
        $this->data['source'] = $recs;
        return $this;
    }
}
