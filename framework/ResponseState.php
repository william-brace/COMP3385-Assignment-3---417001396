<?php

namespace Framework;

class ResponseState extends Response_Abstract {
    
    public function addEntries(array $entries) :bool {
        return false;
    }

    
    public function showEntry(int $i) : string {
        return '';
    }

    
    public function showEntries(int $start, int $end): string {
        return '';
    }
}