<?php 

namespace Framework;

use Framework\Mapper_Abstract;

class UsersMapper extends Mapper_Abstract {
    private $selectStmt;
    private $updateStmt;
    private $insertStmt;
    public function __construct()
    {
        parent::__construct();
        $this->selectStmt = $this->pdo->prepare(
            "SELECT * FROM users WHERE email=?"
        );
        $this->updateStmt = $this->pdo->prepare(
            "UPDATE users SET `name`=?, email=?, `password`=? WHERE email=?"
        );
        $this->insertStmt = $this->pdo->prepare(
            "INSERT INTO users (`name`, email, `password`) VALUES( ?,?,? )"
        );
    }
    protected function targetClass(): string
    {
        return Users::class;
    }
    public function getCollection(array $raw): Collection
    {
        return new UsersCollection($raw, $this);
    }
    protected function doCreateObject(array $raw): Users
    {
        $obj = new Users;

        $obj->name = $raw['name'];
        $obj->email = $raw['email'];
        $obj->password = $raw['password'];

        return $obj;
    }
    protected function doInsert($object)//idk bout this one
    {
        $values = array($object->name,$object->email,$object->password);

        $this->insertStmt->execute($values);
        // $id = $this->pdo->lastInsertId();
        // $object->setId((int)$id);
    }
    public function update(DomainObject $object)//idk bout this one
    {
        $values = [
            $object->getName(),
            $object->getId(),
            $object->getId()
        ];
        $this->updateStmt->execute($values);
    }
    public function selectStmt(): \PDOStatement//idk bout this one
    {
        return $this->selectStmt;
    }
    
}

