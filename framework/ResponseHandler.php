<?php

namespace Framework;

class ResponseHandler implements ResponseHandler_Interface {
    
    protected $body = [];

    public function __construct(ResponseHeader $head, ResponseState $state, ResponseLogger $log) {
        $this->body['header'] = $head;
        $this->body['state'] = $state;
        $this->body['log'] = $log;
    }
    
    public function giveHeader() : ResponseHandler {
        return clone $this->body['header'];
        return clone $this->body['state'];
        return clone $this->body['log'];
    }

    public function giveState() : ResponseState {

    }

    public function giveLogger() : ResponseLogger {

    }
}