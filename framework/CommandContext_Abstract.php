<?php

namespace Framework;

abstract class CommandContext_Abstract {
    
    protected $data = [];
    protected $errors = [];

    public function __construct() {
        $this->data['post'] = $_POST;
        $this->data['get'] = $_GET;
        $this->data['params'] = [];
    }

    //ads a new variable to the context in the sub array
    abstract public function add(string $key, $val);

    // retireves a stored variabls
    abstract public function get( string $method, string $key);

    abstract public function getErrors() : array;

    abstract protected function setError($error);
}