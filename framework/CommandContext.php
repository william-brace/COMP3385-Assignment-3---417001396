<?php 

namespace Framework;

class CommandContext extends CommandContext_Abstract {
    
    public function add(string $key, $val) {

    }

    public function get(string $method, string $key) {

        //$keys = array_keys($this->data[$method], $key);
        
        return $this->data[$method][$key];

        //return $keys;

        //return $this->data[];
    }

    public function getErrors() : array {
        return [];
    }

    protected function setError($error) {

    }
}