<?php

namespace Apps\handlers;

use Framework\Observable_Model;

class ProcessLoginModel extends Observable_Model {

    public function findAll(): array {
       return $_POST;
    }

    public function findRecord(string $id): array {
        return [];
    }

    public function checkUser(string $email, string $password) {
        $connection = $this->makeConnection();


        
    
        
    }

    
}