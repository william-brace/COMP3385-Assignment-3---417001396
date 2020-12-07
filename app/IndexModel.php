<?php
namespace Apps\handlers;

use Framework\Observable_Model;
use Framework\GenCoursesCollection;
use Framework\CoursesMapper;

class IndexModel extends Observable_Model {

    public function findAll(): array {

        $mapper = new CoursesMapper(); 
        $popular = $mapper->getPopular();
        $recommended = $mapper->getRecommended();

        return ['popular'=>$popular, 'recommended'=>$recommended];
    }

    public function findRecord(string $id) : array {
        return [];
    }


}