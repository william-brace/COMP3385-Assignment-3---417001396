<?php

namespace Framework;

// require './framework/Model_Abstract.php';
// require './framework/Observable_Interface.php';

// require './autoload.php';


abstract class Observable_Model extends Model_Abstract implements Observable_Interface  {

    protected $observers = [];

    protected $updatedData = [];

    public function attach(Observer_Interface $observer) {
        $this->observers[] = $observer;
    }
    
    public function detach(Observer_Interface $observer) {
        $this->observers = array_filter($this->observers, function ($a) use ($observer) {
            return (! ($a == $observer));
        });
    }
    
    public function notify() {
        foreach($this->observers as $ob) {
            $ob->update($this);
        }
    }

    public function giveUpdate() {
        return $this->updatedData;
    }

    public function updateTheChangedData(array $data) {
        $this->updatedData[] = $data;
    }

    abstract public function findAll() : array ;

    abstract public function findRecord(string $id) : array ;

}