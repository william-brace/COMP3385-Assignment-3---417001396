<?php 

namespace Framework;


abstract class Mapper_Abstract 
{
    protected $pdo;
    public function __construct()
    {
        $reg = Registry::getInstance();
        $this->pdo = $reg->getPdo();
    }

    public function find($id)
    {
        $this->selectstmt()->execute([$id]);
        $row = $this->selectstmt()->fetch();
        //echo "Mapper abstract selectStmt result " . var_dump($row);
        $this->selectstmt()->closeCursor();
        if (!is_array($row)) {
            return null;
        }
        // if (!isset($row['id'])) {
        //     return null;
        // }
        if (empty($row)) {
            return null;
        }


        $object = $this->createObject($row);
        //print_r($object);
        return $object;
    }


    public function createObject(array $raw)
    {
        $obj = $this->doCreateObject($raw);
        return $obj;

        
    }

    public function insert($obj)
    {
        $this->doInsert($obj);
    }

    abstract public function update(DomainObject $object);
    abstract protected function doCreateObject(array $raw);
    abstract protected function doInsert($object);
    abstract protected function selectStmt(): \PDOStatement;
    abstract protected function targetClass(): string;
}