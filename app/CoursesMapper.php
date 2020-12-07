<?php 

namespace Framework;

use Framework\Mapper_Abstract;
use Framework\Courses;

class CoursesMapper extends Mapper_Abstract {
    private $selectStmt;
    private $updateStmt;
    private $insertStmt;
    private $popularStmt;
    private $recommendedStmt;
    public function __construct()
    {
        parent::__construct();
        $this->selectStmt = $this->pdo->prepare(
            "SELECT * FROM courses WHERE course_id=?"
        );
        // $this->updateStmt = $this->pdo->prepare(
        //     "UPDATE courses SET `name`=?, email=?, `password`=? WHERE email=?"
        // );
        // $this->insertStmt = $this->pdo->prepare(
        //     "INSERT INTO courses (`name`, email, `password`) VALUES( ?,?,? )"
        // );
        $this->popularStmt = $this->pdo->prepare(
            "SELECT * FROM courses ORDER BY course_access_count DESC LIMIT 8"
        );
        $this->recommendedStmt = $this->pdo->prepare(
            "SELECT * FROM courses ORDER BY course_recommendation_count DESC LIMIT 8"
            
        );

    }
    protected function targetClass(): string
    {
        return Courses::class;
    }
    public function getCollection(array $raw): Collection
    {
        return new CoursesCollection($raw, $this);
    }
    protected function doCreateObject(array $raw): Courses
    {
        $obj = new Courses;

        $obj->course_id = $raw['course_id'];
        $obj->course_name = $raw['course_name'];
        $obj->course_description = $raw['course_description'];
        $obj->course_recommendation_count = $raw['course_recommendation_count'];
        $obj->course_access_count = $raw['course_access_count'];
        $obj->course_image = $raw['course_image'];

        return $obj;
    }
    protected function doInsert($object)//idk bout this one
    {
        // $values = array($object->name,$object->email,$object->password);

        // $this->insertStmt->execute($values);
        // // $id = $this->pdo->lastInsertId();
        // // $object->setId((int)$id);
    }
    public function update(DomainObject $object)//idk bout this one
    {
        // $values = [
        //     $object->getName(),
        //     $object->getId(),
        //     $object->getId()
        // ];
        // $this->updateStmt->execute($values);
    }
    public function selectStmt(): \PDOStatement//idk bout this one
    {
        return $this->selectStmt;
    }
    public function popularStmt()
    {
        return $this->popularStmt;
    }
    public function recommendedStmt()
    {
        return $this->recommendedStmt;
    }

    public function getPopular() {
        $this->popularStmt()->execute();
        $row = $this->popularStmt()->fetchAll();

        //var_dump($row);
        
        return $row;


        // $object = $this->createObject($row);
        // print_r($object);
        // return $object;
    }

    public function getRecommended() {
        $this->recommendedStmt()->execute();
        $row = $this->recommendedStmt()->fetchAll();

        //var_dump($row);
        
        return $row;


        // $object = $this->createObject($row);
        // print_r($object);
        // return $object;
    }
}

