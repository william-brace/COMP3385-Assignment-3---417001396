<?php
namespace Apps\handlers;

use Framework\Observable_Model;
use Framework\UsersMapper;
use Framework\Users;

class ProcessRegistrationModel extends Observable_Model {

    public function findAll(): array {

       return $_POST;
    }

    public function findRecord(string $id): array {
        return [];
    }

    

    public function registerUser(array $userData)
    {
        //echo $userData['name'];

        $newUser = new Users;

        $newUser->name = $userData['name'];
        $newUser->email = $userData['email'];
        $newUser->password = $userData['password'];

        //$connection = $this->makeConnection();

        $mapper = new UsersMapper(); 
        $mapper->insert($newUser); 

        //$insert_Result = $this->insert($userData, $connection);

        // if ($insert_Result) {
        //     return true;
        // }
    }
}